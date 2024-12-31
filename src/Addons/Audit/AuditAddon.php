<?php

namespace Obelaw\ERP\Addons\Audit;

use Filament\Panel;
use Obelaw\ERP\Addons\Audit\Filament\Resources\SerialResource;
use Obelaw\Twist\Base\BaseAddon;
use Obelaw\Twist\Concerns\InteractsWithMigration;
use Obelaw\Twist\Contracts\HasMigration;

class AuditAddon extends BaseAddon implements HasMigration
{
    use InteractsWithMigration;

    protected $pathMigrations = __DIR__ . '/../../../database/migrations/audit';

    public function register(Panel $panel): void
    {
        $panel
            ->resources([
                SerialResource::class
            ]);
    }
}
