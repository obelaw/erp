<?php

use Obelaw\UI\Schema\Configurations\Configurations;

return new class
{
    public function configs(Configurations $configs)
    {
        $configs->setConfig('Global', 'obelaw_sales_sales_config_form');
    }
};
