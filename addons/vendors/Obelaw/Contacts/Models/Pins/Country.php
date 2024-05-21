<?php

namespace Obelaw\Contacts\Models\Pins;

use Illuminate\Database\Eloquent\Builder;
use Obelaw\Contacts\Models\Pin;

class Country extends Pin
{
    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::addGlobalScope('type', function (Builder $builder) {
            $builder->where('type', 'country');
        });
    }
}
