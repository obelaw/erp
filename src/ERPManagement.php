<?php

namespace Obelaw\ERP;

use Illuminate\Support\Traits\Macroable;

class ERPManagement
{
    use Macroable;

    protected $configs = null;

    public function __construct()
    {
        $this->configs = o_config();
    }

    /**
     * Get the value of configs
     */
    public function getConfigs()
    {
        return $this->configs;
    }

    public static function getMacros()
    {
        return static::$macros;
    }
}
