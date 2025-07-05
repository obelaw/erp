<?php

namespace Obelaw\Warehouse\Enums;

enum PlaceItemStatus: int
{
    case IN = 1;
    case OUT = 2;
    case PENDING = 3;
}
