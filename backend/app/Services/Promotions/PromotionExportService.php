<?php

namespace App\Services\Promotions;

use App\Models\PromoCodeBatch;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;
use Illuminate\Support\Carbon;
use Symfony\Component\HttpFoundation\StreamedResponse;

class PromotionExportService
{
    public function csv(PromoCodeBatch $batch, User $actor): StreamedResponse
    {
        abort_unless($actor->can('promotions.manage'), 403);
        app(PromotionService::class)->audit($batch->promotion_id, $actor, 'batch.exported.csv', ['batch_id' => $batch->id]);

        return response()->streamDownload(function () use ($batch): void {
            $stream = fopen('php://output', 'w');
            if ($stream === false) {
                return;
            }
            fwrite($stream, "\xEF\xBB\xBF");
            fputcsv($stream, ['Código', 'Lote', 'Estado', 'Tipo', 'Fecha generación', 'Fecha registro']);
            foreach ($batch->codes()->orderBy('id')->cursor() as $code) {
                // Prefix spreadsheet formula characters, even in administrator-provided batch names.
                $name = preg_match('/^[=+@\-\t\r]/', $batch->name) ? "'".$batch->name : $batch->name;
                fputcsv($stream, [$code->code, $name, ['available' => 'Disponible', 'registered' => 'Registrado', 'disabled' => 'Deshabilitado'][$code->status], 'Físico', $code->generated_at->toIso8601String(), $code->registered_at?->toIso8601String()]);
            }
            fclose($stream);
        }, 'lote-'.$batch->id.'.csv', ['Content-Type' => 'text/csv; charset=UTF-8', 'Cache-Control' => 'private, no-store']);
    }

    public function pdf(PromoCodeBatch $batch, User $actor, string $side, int $part = 1): string
    {
        abort_unless($actor->can('promotions.manage'), 403);
        abort_unless(in_array($side, ['front', 'back'], true), 422);
        $batch->load('promotion');
        abort_unless($batch->promotion->draw_at !== null, 422, 'Configura la fecha del sorteo antes de imprimir.');
        abort_unless($batch->status === 'active', 422, 'El lote está deshabilitado.');
        abort_if($part < 1, 422);
        $codes = $batch->codes()->where('status', 'available')->orderBy('id')->skip(($part - 1) * 150)->take(150)->get();
        abort_if($codes->isEmpty(), 422, 'No hay códigos disponibles para imprimir.');
        // Export up to five sheets per request to bound memory on shared hosting.
        $options = new QROptions(['outputBase64' => true, 'scale' => 6]);
        $items = $codes->map(fn ($code): array => ['code' => $code->code, 'qr' => $side === 'front' ? (new QRCode($options))->render(route('promo', ['code' => $code->code])) : null])->all();
        $pages = array_chunk($items, 30);
        $settings = config('promotions.print');
        $logoPath = public_path('images/brand/cacao-del-peru-logo.png');
        $logoSize = getimagesize($logoPath);
        if ($logoSize === false || $logoSize[0] < 1 || $logoSize[1] < 1) {
            throw new \RuntimeException('The coupon logo must be a valid image.');
        }
        [$sourceWidth, $sourceHeight] = $logoSize;
        // Dompdf does not support object-fit. Fit inside the original logo area
        // using the intrinsic aspect ratio instead of stretching both dimensions.
        $scale = min(23 / $sourceWidth, 9 / $sourceHeight);
        $logoWidth = $sourceWidth * $scale;
        $logoHeight = $sourceHeight * $scale;
        $pdf = Pdf::loadView('promo.coupons.sheet', [
            'pages' => $pages, 'side' => $side, 'settings' => $settings,
            'logo' => 'data:image/png;base64,'.base64_encode((string) file_get_contents($logoPath)),
            'logoLayout' => ['width' => $logoWidth, 'height' => $logoHeight, 'left' => (30 - $logoWidth) / 2, 'top' => 1.5 + (9 - $logoHeight) / 2],
            'displayUrl' => parse_url(route('promo'), PHP_URL_HOST).'/promo',
            'drawLabel' => str_replace('.', '', mb_strtoupper(Carbon::parse($batch->promotion->draw_at)->timezone('America/Lima')->locale('es')->translatedFormat('d M'))),
        ])->setPaper('a4')->setOptions(['isRemoteEnabled' => false, 'dpi' => 300, 'defaultFont' => 'DejaVu Sans']);
        $output = $pdf->output();
        app(PromotionService::class)->audit($batch->promotion_id, $actor, 'batch.exported.pdf', ['batch_id' => $batch->id, 'side' => $side, 'part' => $part, 'quantity' => count($items)]);

        return $output;
    }
}
