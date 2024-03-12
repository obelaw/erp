<?php

namespace Obelaw\Warehouse\Enums;

enum TransferStatus: int
{
    case DRAFT = 1; // Create new transfer
    case WAITING = 2; // After Add items to transfer
    case READY = 3; // create new Bundle/s for transfer
    case DONE = 4; // at receive the Bundle/s

    public static function status($value)
    {
        return match ($value) {
            self::DRAFT->value => 'Draft',
            self::WAITING->value => 'Waiting',
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
