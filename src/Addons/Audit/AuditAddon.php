<?php

namespace Obelaw\ERP\Addons\Audit;

use Filament\Panel;
use Obelaw\ERP\Addons\Audit\Filament\Resources\SerialResource;
use Obelaw\Twist\Treis\HasMigration;
use Obelaw\Twist\Base\BaseAddon;

class AuditAddon extends BaseAddon
{
    use HasMigration;

    public function register(Panel $panel): void
    {
        $panel
            ->resources([
                SerialResource::class
            ]);
    }
}
