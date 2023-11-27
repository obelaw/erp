<?php

use Obelaw\Schema\ModuleInfo;

return new class
{
    public function setInfo(ModuleInfo $module)
    {
        $module->info(
            name: 'Accounting',
            icon: 'percentage',
            href: 'obelaw.accounting.home',
        );
    }
};
