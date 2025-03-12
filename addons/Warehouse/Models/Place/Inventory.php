<?php

namespace Obelaw\Warehouse\Models\Place;

use Illuminate\Database\Eloquent\Builder;
use Obelaw\Warehouse\Enums\PlaceType;
use Obelaw\Warehouse\Models\Place;
use Obelaw\Warehouse\Models\Place\Warehouse;

class Inventory extends Place
{
    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::addGlobalScope('recordType', function (Builder $builder) {
            $builder->where('record_type', PlaceType::INVENTORY);
        });
    }

    public function warehouse()
    {
        return $this->hasOne(Warehouse::class, 'id', 'place_id');
    }
}
