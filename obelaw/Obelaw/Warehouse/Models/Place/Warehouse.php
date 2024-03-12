<?php

namespace Obelaw\Warehouse\Models\Place;

use Illuminate\Database\Eloquent\Builder;
use Obelaw\Warehouse\Enums\PlaceType;
use Obelaw\Warehouse\Models\Place;

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
