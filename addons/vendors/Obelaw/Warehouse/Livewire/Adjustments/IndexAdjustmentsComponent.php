<?php

namespace Obelaw\Warehouse\Livewire\Adjustments;

use Obelaw\Permissions\Attributes\Access;
use Obelaw\UI\Renderer\GridRender;

#[Access('warehouse_adjustments_index')]
class IndexAdjustmentsComponent extends GridRender
{
    public $gridId = 'obelaw_warehouse_adjustments_index';

    protected $pretitle = 'Adjustments';
    protected $title = 'Adjustments listing';

    public function inventory($id, $model)
    {
        return '<a href="' . route('obelaw.warehouse.inventories.show', [$model->inventory]) . '">' . $model->inventory->name . '</a>';
    }
}
