<?php

namespace Obelaw\Warehouse\Livewire\Warehouses;

use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Renderer\ViewRender;
use Obelaw\Warehouse\Models\Warehouse;

#[Access('warehouse_warehouses_show')]
class WarehouseShowComponent extends ViewRender
{
    public $vendor = null;
    public $viewId = 'obelaw_warehouse_warehouse_view';

    protected $pretitle = 'Warehouses';
    protected $title = 'Warehouses show';

    public function mount(Warehouse $warehouse)
    {
        $this->parameters(['warehouse' => $warehouse]);
    }
}
