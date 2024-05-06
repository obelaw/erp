<?php

use Obelaw\Schema\ModuleInfo;

return new class
{
    public function setInfo(ModuleInfo $module)
    {
        $module->info(
            name: 'Sales',
            icon: 'currency-dollar',
            href: 'obelaw.sales.home',
            group: 'erp-o',
        );
    }
};
