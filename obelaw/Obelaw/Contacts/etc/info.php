<?php

use Obelaw\Schema\ModuleInfo;

return new class
{
    public function setInfo(ModuleInfo $module)
    {
        $module->info(
            name: 'Contacts',
            icon: 'vendor/obelaw/icons/users.svg',
            href: 'obelaw.contacts.home',
            group: 'helper_modules',
        );
    }
};
