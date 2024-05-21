<?php

namespace Obelaw\Warehouse\Livewire\Transfers\Views;

use Livewire\Component;

class TransfersItems extends Component
{
    public $transfer = null;

    public function mount($transfer)
    {
        $this->transfer = $transfer;
    }

    public function render()
    {
        return <<<'BLADE'
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-vcenter card-table table-striped">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th class="w-1"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($this->transfer->items as $item)
                                <tr>
                                    <td>
                                        {{ $item->product->name }}
                                    </td>
                                    <td> 
                                        {{ $item->quantity }}
                                    </td>
                                    <td>
                                        <a href="{{ route('obelaw.warehouse.serial-numbers.detail', [$item]) }}">Show</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        BLADE;
    }
}
