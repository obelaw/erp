<?php

use Obelaw\Schema\ModuleInfo;

return new class
{
    public function setInfo(ModuleInfo $module)
    {
        $module->info(
            name: 'Contacts',
            icon: 'users',
            href: 'obelaw.contacts.home',
            group: 'helper_modules',
        );
    }
};
