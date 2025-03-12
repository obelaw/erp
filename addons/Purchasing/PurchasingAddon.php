<?php

namespace Obelaw\Purchasing;

use Filament\Panel;
use Obelaw\Purchasing\Filament\Resources\PaymentTermResource;
use Obelaw\Purchasing\Filament\Resources\PurchaseOrderResource;
use Obelaw\Purchasing\Filament\Resources\VendorResource;
use Obelaw\Twist\Base\BaseAddon;
use Obelaw\Twist\Concerns\InteractsWithMigration;
use Obelaw\Twist\Contracts\HasMigration;

class PurchasingAddon extends BaseAddon implements HasMigration
{
    use InteractsWithMigration;

    protected $pathMigrations = __DIR__ . '/database/migrations';

    public function register(Panel $panel): void
    {
        $panel
            ->discoverClusters(
                in: __DIR__ . DIRECTORY_SEPARATOR . 'Filament' . DIRECTORY_SEPARATOR . 'Clusters',
                for: 'Obelaw\\Purchasing\\Filament\\Clusters'
            )
            ->resources([
                VendorResource::class,
                PurchaseOrderResource::class,
                PaymentTermResource::class,
            ])
            ->widgets([
                \Obelaw\Warehouse\Filament\Widgets\TransferNeedApproveWidget::class,
            ])
            ->pages([]);
    }
}
