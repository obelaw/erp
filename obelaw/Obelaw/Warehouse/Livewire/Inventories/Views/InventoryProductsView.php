<?php

namespace Obelaw\Warehouse\Livewire\Inventories\Views;

use Livewire\Component;

class InventoryProductsView extends Component
{
    public function mount($inventory)
    {
        $this->inventory = $inventory->serialNumbers->serials;
    }

    public function render()
    {
        return <<<'BLADE'
            <div>
                <div class="datagrid-item">
                    <div class="datagrid-title">Warehouse name</div>
                    <div class="datagrid-content">{{ $this->inventory->warehouse->name }}</div>
                </div>
                <div class="datagrid-item mt-3">
                    <div class="datagrid-title">Name</div>
                    <div class="datagrid-content">{{ $this->inventory->name }}</div>
                </div>
                <div class="datagrid-item mt-3">
                    <div class="datagrid-title">Code</div>
                    <div class="datagrid-content">{{ $this->inventory->code }}</div>
                </div>
                <div class="datagrid-item mt-3">
                    <div class="datagrid-title">Address</div>
                    <div class="datagrid-content">{{ $this->inventory->address ?? '-' }}</div>
                </div>
                <div class="datagrid-item mt-3">
                    <div class="datagrid-title">Description</div>
                    <div class="datagrid-content">{{ $this->inventory->description ?? '-'}}</div>
                </div>
            </div>
        BLADE;
    }
}
