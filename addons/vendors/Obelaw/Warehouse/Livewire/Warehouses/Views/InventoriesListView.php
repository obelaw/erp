<?php

namespace Obelaw\Warehouse\Livewire\Warehouses\Views;

use Livewire\Component;

class InventoriesListView extends Component
{
    public function mount($warehouse)
    {
        $this->inventories = $warehouse->places;
    }

    public function render()
    {
        return <<<'BLADE'
            <div class="card">
                @if ($this->inventories->isEmpty())
                    <div class="empty">
                        <div class="empty-icon">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="icon icon-tabler icon-tabler-mood-empty" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                                <path d="M9 10l.01 0"></path>
                                <path d="M15 10l.01 0"></path>
                                <path d="M9 15l6 0"></path>
                            </svg>
                        </div>
                        <p class="empty-title">No results found</p>
                        <p class="empty-subtitle text-secondary">
                            Try adjusting your search or filter or creating a new record to find a records.
                        </p>
                    </div>
                @endif
                @if ($this->inventories->isNotEmpty())
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
                @endif
            </div>
        BLADE;
    }
}
