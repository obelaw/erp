<?php

use Obelaw\Schema\ModuleInfo;

return new class
{
    public function setInfo(ModuleInfo $module)
    {
        $module->info(
            name: 'Warehouse',
            icon: 'vendor/obelaw/icons/building-warehouse.svg',
            href: 'obelaw.warehouse.home',
            group: 'erp-o',
        );
    }
};
