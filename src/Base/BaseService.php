<?php

namespace Obelaw\Flow\Base;

use Illuminate\Support\Traits\Macroable;

abstract class BaseService
{
    use Macroable;

    public static function make(): static
    {
        return app(static::class);
    }
}
