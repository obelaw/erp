<?php

namespace Obelaw\Warehouse\Builder;

use Illuminate\Database\Eloquent\Builder;
use Obelaw\Framework\Contracts\Builder\Grid\WhereBuilder;

class InventoryItemWhere implements WhereBuilder
{
    public function where(Builder $query)
    {
        $query->where('status', 1);
    }
}
