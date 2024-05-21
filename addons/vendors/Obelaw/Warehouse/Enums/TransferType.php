<?php

namespace Obelaw\Warehouse\Enums;

enum TransferType: int
{
    case SUPPLY = 1;
    case TRANSFER = 2;
    case ORDER = 3;
    case RETURN = 4;
}
