<?php

use Obelaw\Schema\ModuleInfo;

return new class
{
    public function setInfo(ModuleInfo $module)
    {
        $module->info(
            name: 'Manufacturing',
            icon: 'building-factory',
            href: 'obelaw.manufacturing.home',
        );
    }
};
