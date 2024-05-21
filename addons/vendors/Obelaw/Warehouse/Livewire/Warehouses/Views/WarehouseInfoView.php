<?php

namespace Obelaw\Warehouse\Livewire\Warehouses\Views;

use Livewire\Component;

class WarehouseInfoView extends Component
{
    public function mount($warehouse)
    {
        $this->warehouse = $warehouse;
    }

    public function render()
    {
        return <<<'BLADE'
            <div>
                <div class="datagrid-item">
                    <div class="datagrid-title">Name</div>
                    <div class="datagrid-content">{{ $this->warehouse->name }}</div>
                </div>
                <div class="datagrid-item mt-3">
                    <div class="datagrid-title">Code</div>
                    <div class="datagrid-content">{{ $this->warehouse->code }}</div>
                </div>
                <div class="datagrid-item mt-3">
                    <div class="datagrid-title">Address</div>
                    <div class="datagrid-content">{{ $this->warehouse->address }}</div>
                </div>
                <div class="datagrid-item mt-3">
                    <div class="datagrid-title">Description</div>
                    <div class="datagrid-content">{{ $this->warehouse->description }}</div>
                </div>
            </div>
        BLADE;
    }
}
