<?php

namespace Obelaw\Accounting\Model\AccountShapes;

use Illuminate\Database\Eloquent\Builder;
use Obelaw\Accounting\Model\Account;
use Obelaw\Accounting\Model\ShapeModel;

class CurrentLiabilitiesAccount extends Account
{
    use ShapeModel;

    public static function builderWhere(Builder $builder)
    {
        $builder->where('type', 'current_liabilities');
    }
}
