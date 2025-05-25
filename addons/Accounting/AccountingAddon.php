<?php

namespace Obelaw\Accounting;

use Filament\Panel;
use Obelaw\Accounting\Filament\Resources\AccountResource;
use Obelaw\Accounting\Filament\Resources\AccountTypeResource;
use Obelaw\Accounting\Filament\Resources\PaymentMethodResource;
use Obelaw\Accounting\Filament\Resources\PriceListResource;
use Obelaw\Accounting\Filament\Resources\TransactionResource;
use Obelaw\Twist\Base\BaseAddon;
use Obelaw\Twist\Concerns\InteractsWithDispatcher;
use Obelaw\Twist\Concerns\InteractsWithMigration;
use Obelaw\Twist\Contracts\HasDispatcher;
use Obelaw\Twist\Contracts\HasMigration;

class AccountingAddon extends BaseAddon implements HasMigration, HasDispatcher
{
    use InteractsWithMigration;
    use InteractsWithDispatcher;

    protected $pathDispatchers = __DIR__ . '/executors';
    protected $pathMigrations = __DIR__ . '/database/migrations';

    public function register(Panel $panel): void
    {
        $panel
            ->discoverClusters(
                in: __DIR__ . DIRECTORY_SEPARATOR . 'Filament' . DIRECTORY_SEPARATOR . 'Clusters',
                for: 'Obelaw\\Accounting\\Filament\\Clusters'
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
