<?php

namespace Obelaw\Purchasing\Enums;

enum POStatus: int
{
    case DRAFT = 1;
    case READY = 2;
    case DONE = 3;

    public static function status($value)
    {
        return match ($value) {
            self::DRAFT->value => 'Draft',
            self::READY->value => 'Ready',
            self::DONE->value => 'Done',
        };
    }

    public static function __callStatic($name, $args)
    {
        $name = strtoupper($name);

        if ($case = array_filter(static::cases(), fn ($case) => $case->name == $name))
            return current($case)->value;

        throw new \Exception('This product type does not exists');
    }
}
