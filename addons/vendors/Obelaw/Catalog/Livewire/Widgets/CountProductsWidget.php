<?php

namespace Obelaw\Catalog\Livewire\Widgets;

use Livewire\Component;
use Obelaw\Catalog\Models\Product;

class CountProductsWidget extends Component
{
    public $count = 0;
    public function mount()
    {
        $this->count = Product::count();
    }

    public function render()
    {
        return <<<'BLADE'
            <div class="card card-sm">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <span class="bg-primary text-white avatar">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-brand-producthunt" width="24"
                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M10 16v-8h2.5a2.5 2.5 0 1 1 0 5h-2.5"></path>
                                    <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                                </svg>
                            </span>
                        </div>
                        <div class="col">
                            <div class="font-weight-medium">
                                {{ $count }} Products
                            </div>
                            <div class="text-muted">
                                Count Of Products
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        BLADE;
    }
}
