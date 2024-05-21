<?php

namespace Obelaw\Accounting\Livewire\Widgets;

use Livewire\Component;
use Obelaw\Accounting\Model\PriceList;

class CountPriceListWidget extends Component
{
    public $count = 0;
    public function mount()
    {
        $this->count = PriceList::count();
    }

    public function render()
    {
        return <<<'BLADE'
            <div class="card card-sm">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <span class="bg-info text-white avatar">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-receipt-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16l-3 -2l-2 2l-2 -2l-2 2l-2 -2l-3 2" /><path d="M14 8h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5m2 0v1.5m0 -9v1.5" /></svg>
                            </span>
                        </div>
                        <div class="col">
                            <div class="font-weight-medium">
                                {{ $count }} Price List
                            </div>
                            <div class="text-muted">
                                Count of price list
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        BLADE;
    }
}
