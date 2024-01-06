<?php

namespace Obelaw\Warehouse\Livewire\Warehouses;

use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Renderer\FormRender;
use Obelaw\Warehouse\Models\Warehouse;

#[Access('warehouse_warehouses_update')]
class WarehouseUpdateComponent extends FormRender
{
    public $formId = 'obelaw_warehouse_warehouses_form';

    public $warehouse = null;

    protected $pretitle = 'Warehouses';
    protected $title = 'Update the warehouse';

    public function mount(Warehouse $warehouse)
    {
        $this->name = $warehouse->name;
        $this->code = $warehouse->code;
        $this->description = $warehouse->description;
        $this->address = $warehouse->address;

        $this->warehouse = $warehouse;
    }

    public function submit()
    {
        $validateData = $this->validate();

        $this->warehouse->update($validateData);
    }
}
