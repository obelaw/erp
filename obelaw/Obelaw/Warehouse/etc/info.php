<?php

use Obelaw\Schema\ModuleInfo;

return new class
{
    public function setInfo(ModuleInfo $module)
    {
        $module->info(
            name: 'Warehouse',
            icon: 'building-warehouse',
            href: 'obelaw.warehouse.home',
        );
    }
};
