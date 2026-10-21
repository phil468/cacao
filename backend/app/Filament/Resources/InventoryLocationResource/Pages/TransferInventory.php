<?php

namespace App\Filament\Resources\InventoryLocationResource\Pages;

use App\Filament\Resources\InventoryLocationResource;
use App\Models\InventoryLocation;
use App\Models\User;
use App\Services\LocationInventoryService;
use Filament\Facades\Filament;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\Concerns\InteractsWithRecord;
use Filament\Resources\Pages\Page;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Locked;
use Symfony\Component\HttpKernel\Exception\ConflictHttpException;

class TransferInventory extends Page
{
    use InteractsWithRecord;

    protected static string $resource = InventoryLocationResource::class;

    protected static ?string $title = 'Transferir stock en lote';

    protected string $view = 'filament.inventory-transfer';

    #[Locked]
    public string $submissionId;

    /** @var list<array{id: int, name: string, sku: string, category: string, stock: int, active: bool}> */
    #[Locked]
    public array $catalog = [];

    /** @var array<int|string, mixed> */
    public array $quantities = [];

    public string $to_location_id = '';

    public string $reason = '';

    public string $search = '';

    public string $category = '';

    public bool $selectedOnly = false;

    /** @var array<string, mixed> */
    #[Locked]
    public array $reviewData = [];

    #[Locked]
    public ?int $transferId = null;

    public function mount(int|string $record): void
    {
        $this->record = $this->resolveRecord($record);
        $this->actor();
        abort_unless($this->source()->is_active, 404);
        $this->submissionId = (string) Str::uuid();
        $this->refreshCatalog();
    }

    public function refreshCatalog(): void
    {
        $actor = $this->actor();
        if ($this->reviewData || $this->transferId !== null) {
            return;
        }
        $this->catalog = app(LocationInventoryService::class)->transferCatalog($this->source(), $actor);
        foreach ($this->catalog as $row) {
            $this->quantities[$row['id']] ??= 0;
        }
    }

    public function review(): void
    {
        $actor = $this->actor();
        if ($this->transferId !== null || $this->reviewData) {
            return;
        }
        $this->resetErrorBag();
        $this->validate(['quantities' => ['required', 'array', 'max:5000'], 'quantities.*' => ['nullable', 'integer', 'min:0', 'max:100000']], [
            'quantities.*.integer' => 'Las cantidades deben ser números enteros.',
            'quantities.*.min' => 'Las cantidades no pueden ser negativas.',
            'quantities.*.max' => 'La cantidad máxima por presentación es 100000.',
        ]);
        validator(['ids' => array_keys($this->quantities)], ['ids.*' => 'required|integer|min:1'], ['ids.*' => 'La selección contiene una presentación inválida.'])->validate();
        $items = [];
        foreach ($this->quantities as $id => $quantity) {
            if ((int) $quantity > 0) {
                $items[] = ['variant_id' => (int) $id, 'quantity' => (int) $quantity];
            }
        }
        try {
            $this->reviewData = app(LocationInventoryService::class)->previewTransfer([
                'submission_id' => $this->submissionId, 'from_location_id' => $this->source()->id,
                'to_location_id' => $this->to_location_id, 'reason' => $this->reason, 'items' => $items,
            ], $actor);
        } catch (ValidationException $exception) {
            $this->onValidationError($exception);

            throw $exception;
        }
        $this->dispatch('transfer-review-ready');
    }

    public function back(): void
    {
        $this->actor();
        if ($this->transferId !== null) {
            return;
        }
        // Keep the UUID even when editing, so a lost response cannot duplicate a transfer.
        $this->reviewData = [];
        $this->resetErrorBag();
        $this->refreshCatalog();
    }

    public function confirm(): void
    {
        $actor = $this->actor();
        if ($this->transferId !== null) {
            return;
        }
        if (! $this->reviewData) {
            throw ValidationException::withMessages(['transfer' => 'Primero revisa el resumen de la transferencia.']);
        }
        $this->resetErrorBag();
        try {
            // Only the locked, server-reviewed payload is used, never editable quantities.
            $this->transferId = app(LocationInventoryService::class)->transfer($this->reviewData['payload'], $actor);
        } catch (ValidationException $exception) {
            foreach ($exception->errors() as $field => $messages) {
                foreach ($messages as $message) {
                    $this->addError($field, $message);
                }
            }
            $this->onValidationError($exception);

            return;
        } catch (ConflictHttpException $exception) {
            $this->addError('transfer', $exception->getMessage());
            Notification::make()->danger()->title('No se pudo confirmar la transferencia')->body(e($exception->getMessage()))->persistent()->send();

            return;
        }
        Notification::make()->success()->title('Transferencia registrada')->body('Se movieron todos los productos en una sola operación.')->send();
        $this->dispatch('transfer-review-ready');
    }

    protected function onValidationError(ValidationException $exception): void
    {
        $message = array_values($exception->errors())[0][0] ?? 'Revisa los campos señalados.';
        Notification::make()->danger()->title('Revisa los datos de la transferencia')->body(e($message))->persistent()->send();
    }

    private function source(): InventoryLocation
    {
        $record = $this->getRecord();
        abort_unless($record instanceof InventoryLocation, 404);

        return $record;
    }

    private function actor(): User
    {
        $user = auth()->user();
        abort_unless($user instanceof User && $user->is_active && $user->canAccessPanel(Filament::getPanel('admin')) && $user->can('inventory.manage'), 403);

        return $user;
    }

    /** @return array<string, mixed> */
    protected function getViewData(): array
    {
        $this->actor();
        $needle = mb_strtolower(trim($this->search));
        $rows = array_values(array_filter($this->catalog, fn (array $row): bool => ($this->category === '' || $row['category'] === $this->category)
            && ($needle === '' || str_contains(mb_strtolower($row['name'].' '.$row['sku']), $needle))
            && (! $this->selectedOnly || (int) ($this->quantities[$row['id']] ?? 0) > 0)));

        return ['source' => $this->source(), 'rows' => $rows,
            'categories' => array_values(array_unique(array_column($this->catalog, 'category'))),
            'destinations' => InventoryLocation::where('is_active', true)->whereKeyNot($this->source()->id)->orderBy('name')->get(['id', 'name']),
            'indexUrl' => InventoryLocationResource::getUrl('index'),
            'newUrl' => InventoryLocationResource::getUrl('transfer', ['record' => $this->source()->id])];
    }
}
