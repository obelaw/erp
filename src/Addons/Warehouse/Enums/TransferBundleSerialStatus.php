<?php

namespace Obelaw\ERP\Addons\Warehouse\Enums;

enum TransferBundleSerialStatus: int
{
    case PENDING = 1;
    case REJECTED = 2;
    case APPROVAL = 3;

    public static function __callStatic($name, $args)
    {
        $name = strtoupper($name);

        if ($case = array_filter(static::cases(), fn ($case) => $case->name == $name))
            return current($case)->value;

        throw new \Exception('This product type does not exists');
    }
}
