<?php

namespace Obelaw\ERP\Addons\Accounting;

use Filament\Panel;
use Obelaw\ERP\Addons\Accounting\Filament\Resources\AccountResource;
use Obelaw\ERP\Addons\Accounting\Filament\Resources\AccountTypeResource;
use Obelaw\ERP\Addons\Accounting\Filament\Resources\PaymentMethodResource;
use Obelaw\ERP\Addons\Accounting\Filament\Resources\PriceListResource;
use Obelaw\ERP\Addons\Accounting\Filament\Resources\TransactionResource;
use Obelaw\Twist\Base\BaseAddon;

class AccountingAddon extends BaseAddon
{
    public function pathMigrations()
    {
        return '/vendor/erp-o/erp/src/Addons/Accounting/generate/migrations';
    }

    public function register(Panel $panel): void
    {
        $panel
            ->discoverClusters(
                in: __DIR__ . DIRECTORY_SEPARATOR . 'Filament' . DIRECTORY_SEPARATOR . 'Clusters',
                for: 'Obelaw\\ERP\\Addons\\Accounting\\Filament\\Clusters'
            )
            ->resources([
                AccountResource::class,
                TransactionResource::class,
                PriceListResource::class,
                PaymentMethodResource::class,
                AccountTypeResource::class,
            ]);
    }
}
