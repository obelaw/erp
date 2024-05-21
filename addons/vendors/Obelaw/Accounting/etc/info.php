<?php

use Obelaw\Schema\ModuleInfo;

return new class
{
    public function setInfo(ModuleInfo $module)
    {
        $module->info(
            name: 'Accounting',
            icon: 'vendor/obelaw/icons/accounting.svg',
            href: 'obelaw.accounting.home',
            group: 'erp-o',
        );
    }
};
