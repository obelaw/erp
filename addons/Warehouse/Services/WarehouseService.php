<?php

namespace Obelaw\Warehouse\Services;

use Obelaw\Warehouse\Models\Place;
use Obelaw\Warehouse\Services\PlaceService;

class WarehouseService
{
    public function place(Place $place)
    {
        return new PlaceService($place);
    }
}
