<?php

namespace Obelaw\Warehouse\Livewire\Warehouses;

use Obelaw\Permissions\Attributes\Access;
use Obelaw\UI\Renderer\ViewRender;
use Obelaw\Warehouse\Models\Place\Warehouse;
use function O\Warehouse\is_warehouse;

#[Access('warehouse_warehouses_show')]
class ShowWarehouseComponent extends ViewRender
{
    public $vendor = null;
    public $viewId = 'obelaw_warehouse_warehouse_view';

    protected $pretitle = 'Warehouses';
    protected $title = 'Warehouses show';

    public function mount(Warehouse $warehouse)
    {
        abort_if(!is_warehouse($warehouse), 404);

        $this->parameters(['warehouse' => $warehouse]);
    }
}
