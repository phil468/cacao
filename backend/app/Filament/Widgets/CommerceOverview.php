<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use App\Models\ProductVariant;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class CommerceOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $pending = Order::whereHas('status', fn ($q) => $q->whereIn('code', ['pending_payment', 'payment_review', 'preparing']))->count();
        $sales = (int) Order::whereHas('status', fn ($q) => $q->where('code', 'delivered'))->sum('total_amount');
        $lowStock = ProductVariant::whereColumn('stock', '<=', 'low_stock_threshold')->where('is_active', true)->count();

        return [Stat::make('Ventas entregadas', 'S/ '.number_format($sales / 100, 2))->description('Total histórico confirmado'), Stat::make('Pedidos pendientes', (string) $pending)->description('Requieren seguimiento')->color($pending > 0 ? 'warning' : 'success'), Stat::make('Productos con stock bajo', (string) $lowStock)->description('Variantes bajo el umbral')->color($lowStock > 0 ? 'danger' : 'success'), Stat::make('Pedidos totales', (string) Order::count())->description('Desde el inicio')];
    }
}
