<?php

namespace Obelaw\ERP\Addons\Accounting;

use Filament\Panel;
use Obelaw\ERP\Addons\Accounting\Filament\Resources\AccountEntryResource;
use Obelaw\ERP\Addons\Accounting\Filament\Resources\AccountResource;
use Obelaw\Twist\Base\BaseAddon;

class AccountingAddon extends BaseAddon
{
    public function pathMigrations()
    {
        return 'vendor/erp-o/erp/src/Addons/Accounting/generate/migrations';
    }

    public function register(Panel $panel): void
    {
        $panel
            ->resources([
                AccountResource::class,
                AccountEntryResource::class,
            ]);
    }
}
