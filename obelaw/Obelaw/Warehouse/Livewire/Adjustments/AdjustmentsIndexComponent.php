<?php

namespace Obelaw\Warehouse\Livewire\Adjustments;

use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Renderer\GridRender;

#[Access('warehouse_adjustments_index')]
class AdjustmentsIndexComponent extends GridRender
{
    public $gridId = 'obelaw_warehouse_adjustments_index';

    protected $pretitle = 'Adjustments';
    protected $title = 'Adjustments listing';
}
