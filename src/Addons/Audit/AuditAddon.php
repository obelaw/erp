<?php

namespace Obelaw\ERP\Addons\Audit;

use Filament\Panel;
use Obelaw\ERP\Addons\Audit\Filament\Resources\SerialResource;
use Obelaw\Twist\Base\BaseAddon;

class AuditAddon extends BaseAddon
{
    public function pathMigrations()
    {
        return '/vendor/erp-o/erp/src/Addons/Audit/generate/migrations';
    }

    public function register(Panel $panel): void
    {
        $panel
            ->resources([
                SerialResource::class
            ]);
    }
}
