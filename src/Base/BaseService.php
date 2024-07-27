<?php

namespace Obelaw\ERP\Base;

use Illuminate\Support\Traits\Macroable;

abstract class BaseService
{
    use Macroable;

    public static function make(): static
    {
        return app(static::class);
    }
}
