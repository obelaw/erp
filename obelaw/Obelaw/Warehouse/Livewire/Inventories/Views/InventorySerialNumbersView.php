<?php

namespace Obelaw\Warehouse\Livewire\Inventories\Views;

use Livewire\Component;

class InventorySerialNumbersView extends Component
{
    public function mount($inventory)
    {
        $this->items = $inventory->items()->where('status', 'stock')->get();
    }

    public function render()
    {
        return <<<'BLADE'
            <div class="table-responsive">
                <table class="table table-vcenter card-table table-striped">
                    <thead>
                        <tr>
                            <th>Serial</th>
                            <th>Product</th>
                            <th>Barcode</th>
                            <th class="w-1"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($this->items as $item)
                            <tr>
                                <td>
                                    {{ $item->serial }}
                                </td>
                                <td>
                                    {{ $item->barcode }}
                                </td>
                                <td> 
                                    {{ $item->status ?? '-' }}
                                </td>
                                <td>
                                    <a href="{{ route('obelaw.warehouse.serial-numbers.detail', [$item]) }}">Show</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        BLADE;
    }
}
