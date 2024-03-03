<?php

namespace Obelaw\Accounting\Model;

use Illuminate\Database\Eloquent\Builder;

trait ShapeModel
{
    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::addGlobalScope('AccountType', function (Builder $builder) {
            static::builderWhere($builder);
        });
    }
}
