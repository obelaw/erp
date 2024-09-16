<?php

namespace Obelaw\ERP\Addons\Warehouse\Models\Place;

use Illuminate\Database\Eloquent\Builder;
use Obelaw\ERP\Addons\Warehouse\Enums\PlaceType;
use Obelaw\ERP\Addons\Warehouse\Models\Place;

class Warehouse extends Place
{
    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::addGlobalScope('recordType', function (Builder $builder) {
            $builder->where('record_type', PlaceType::WAREHOUSE);
        });
    }
}
