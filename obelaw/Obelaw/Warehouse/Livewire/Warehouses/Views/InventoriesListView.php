<?php

namespace Obelaw\Warehouse\Livewire\Warehouses\Views;

use Livewire\Component;

class InventoriesListView extends Component
{
    public function mount($warehouse)
    {
        $this->inventories = $warehouse->inventories;
    }

    public function render()
    {
        return <<<'BLADE'
            <div class="table-responsive">
                <table class="table table-vcenter card-table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Code</th>
                            <th class="w-1"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($this->inventories as $inventory)
                            <tr>
                                <td>
                                    {{ $inventory->name }}
                                </td>
                                <td>{{ $inventory->code }}</td>
                                <td>
                                    <a href="#">Show</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        BLADE;
    }
}
