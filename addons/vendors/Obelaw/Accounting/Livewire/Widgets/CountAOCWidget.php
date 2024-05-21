<?php

namespace Obelaw\Accounting\Livewire\Widgets;

use Livewire\Component;
use Obelaw\Accounting\Facades\Accounts;

class CountAOCWidget extends Component
{
    public $count = 0;
    public function mount()
    {
        $this->count = Accounts::getCount();
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
                                    class="icon icon-tabler icon-tabler-chart-bar" width="24"
                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path
                                        d="M3 12m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v6a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z">
                                    </path>
                                    <path
                                        d="M9 8m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v10a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z">
                                    </path>
                                    <path
                                        d="M15 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v14a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z">
                                    </path>
                                    <path d="M4 20l14 0"></path>
                                </svg>
                            </span>
                        </div>
                        <div class="col">
                            <div class="font-weight-medium">
                                {{ $count }} COA
                            </div>
                            <div class="text-muted">
                                Chart of accounts
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        BLADE;
    }
}
