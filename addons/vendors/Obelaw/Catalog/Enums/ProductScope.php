<?php

namespace Obelaw\Catalog\Enums;

enum ProductScope: int
{
    case RAW_MATERIAL = 1;
    case SEMI_FINISHED = 2;
    case FINISHED = 3;

    public static function __callStatic($name, $args)
    {
        $name = strtoupper($name);

        if ($case = array_filter(static::cases(), fn ($case) => $case->name == $name))
            return current($case)->value;

        throw new \Exception('This case does not exists');
    }
}
