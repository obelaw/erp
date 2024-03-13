<?php

namespace Obelaw\Warehouse\Livewire\Transfers\Views;

use Livewire\Component;

class TransfersInfoView extends Component
{
    public $transfer = null;

    public function mount($transfer)
    {
        $this->transfer = $transfer;
    }

    public function render()
    {
        return <<<'BLADE'
            <div>
                <div class="datagrid-item">
                    <div class="datagrid-title">Inventory From</div>
                    <div class="datagrid-content">{{ $this->transfer->inventory_from }}</div>
                </div>
                <div class="datagrid-item mt-3">
                    <div class="datagrid-title">Inventory To</div>
                    <div class="datagrid-content">{{ $this->transfer->inventory_to }}</div>
                </div>
                <div class="datagrid-item mt-3">
                    <div class="datagrid-title">Type</div>
                    <div class="datagrid-content">{{ $this->transfer->type }}</div>
                </div>
                <div class="datagrid-item mt-3">
                    <div class="datagrid-title">Description</div>
                    <div class="datagrid-content">{{ $this->transfer->description ?? '-' }}</div>
                </div>
            </div>
        BLADE;
    }
}
