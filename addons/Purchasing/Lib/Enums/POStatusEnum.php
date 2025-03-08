<?php

namespace Obelaw\ERP\Addons\Purchasing\Lib\Enums;

enum POStatusEnum: int
{
    case QUOTATION = 1;
    case PROCESSING = 2;
    case DONE = 3;

    public static function status($value)
    {
        return match ($value) {
            self::QUOTATION->value => 'Quotation',
            self::PROCESSING->value => 'Processing',
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
