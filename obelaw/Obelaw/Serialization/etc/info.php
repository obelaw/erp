<?php

use Obelaw\Schema\ModuleInfo;

return new class
{
    public function setInfo(ModuleInfo $module)
    {
        $module->info(
            name: 'Serialization',
            icon: 'file-barcode',
            href: 'obelaw.serialization.home',
            group: 'helper_modules',
        );
    }
};
