<?php

namespace Obelaw\Warehouse\Livewire\Transfers\Views;

use Livewire\Component;

class TransfersBundles extends Component
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
                                <th>Serial</th>
                                <th>Status</th>
                                <th class="w-1"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($this->transfer->bundles as $bundle)
                                <tr>
                                    <td>
                                        {{ $bundle->serial }}
                                    </td>
                                    <td> 
                                        {{ $bundle->status }}
                                    </td>
                                    <td>
                                        <a href="{{ route('obelaw.warehouse.transfer.bundles.show', [$bundle]) }}">Show</a>
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
