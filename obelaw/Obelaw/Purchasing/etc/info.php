<?php

use Obelaw\Schema\ModuleInfo;

return new class
{
    public function setInfo(ModuleInfo $module)
    {
        $module->info(
            name: 'Purchasing',
            icon: 'vendor/obelaw/icons/purchasing.svg',
            href: 'obelaw.purchasing.home',
            group: 'erp-o',
        );
    }
};
