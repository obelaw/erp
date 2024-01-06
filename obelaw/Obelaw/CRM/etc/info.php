<?php

use Obelaw\Schema\ModuleInfo;

return new class
{
    public function setInfo(ModuleInfo $module)
    {
        $module->info(
            name: 'CRM',
            icon: 'heart-handshake',
            href: 'obelaw.crm.home',
        );
    }
};
