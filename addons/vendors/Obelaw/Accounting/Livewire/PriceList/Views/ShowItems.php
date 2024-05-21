<?php

namespace Obelaw\Accounting\Livewire\PriceList\Views;

use Livewire\Component;

class ShowItems extends Component
{
    public function mount($list)
    {
        $this->items = $list->items;
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
                        @foreach($this->items as $item)
                            <tr>
                                <td>
                                    {{ $item->sku }}
                                </td>
                                <td>{{ amount($item->price) }}</td>
                                <td>
                                    <a href="#">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        BLADE;
    }
}
