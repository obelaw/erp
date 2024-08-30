<?php

namespace O\Warehouse;

use Obelaw\ERP\Addons\Warehouse\Enums\PlaceType;
use Obelaw\Warehouse\Models\Place\Warehouse;

function is_warehouse(Warehouse $record)
{
    return $record->record_type === PlaceType::WAREHOUSE->value;
}
