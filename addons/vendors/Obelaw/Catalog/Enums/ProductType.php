<?php

namespace Obelaw\Catalog\Enums;

enum ProductType: int
{
    case CONSUMABLE = 1;
    case SERVICE = 2;
    case STORABLE = 3;

    public function type()
    {
        return match ($this) {
            self::CONSUMABLE => 'Consumable',
            self::SERVICE => 'Service',
            self::STORABLE => 'Storable',
        };
    }
}
