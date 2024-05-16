<?php

use Obelaw\Schema\ModuleInfo;

return new class
{
    public function setInfo(ModuleInfo $module)
    {
        $module->info(
            name: 'Catalog',
            icon: 'vendor/obelaw/icons/catalog.svg',
            href: 'obelaw.catalog.home',
            group: 'helper_modules',
        );
    }
};
