<?php

namespace Obelaw\Warehouse\Livewire\Bundles\Views;

use Livewire\Component;

class BundlesInfoView extends Component
{
    public $bundle = null;

    public function mount($bundle)
    {
        $this->bundle = $bundle;
    }

    public function render()
    {
        return <<<'BLADE'
            <div>
                <div class="datagrid-item">
                    <div class="datagrid-title">Product Name</div>
                    <div class="datagrid-content">{{ $this->bundle->item->product->name }}</div>
                </div>
            </div>
        BLADE;
    }
}
