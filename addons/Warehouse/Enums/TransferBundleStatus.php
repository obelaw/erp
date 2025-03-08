<?php

namespace Obelaw\ERP\Addons\Warehouse\Enums;

enum TransferBundleStatus: int
{
    case DRAFT = 0;
    case ASSIGNED = 1;
    case CONFIRM = 2;

    public static function status($value)
    {
        return match ($value) {
            self::DRAFT->value => 'Draft',
            self::ASSIGNED->value => 'Assigned',
            self::CONFIRM->value => 'Confirm',
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
