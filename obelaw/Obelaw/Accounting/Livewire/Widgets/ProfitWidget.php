<?php

namespace Obelaw\Accounting\Livewire\Widgets;

use Livewire\Component;
use Obelaw\Accounting\Model\AccountEntryAmount;

class ProfitWidget extends Component
{
    public $profit = 0;
    public function mount()
    {
        $debitSum = AccountEntryAmount::whereType('debit')->sum('amount');
        $creditSum = AccountEntryAmount::whereType('credit')->sum('amount');

        $this->profit = $debitSum - $creditSum;
    }

    public function render()
    {
        return <<<'BLADE'
            <div class="card card-sm">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <span class="bg-green text-white avatar">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-coin-pound" width="24"
                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                                    <path d="M15 9a2 2 0 1 0 -4 0v5a2 2 0 0 1 -2 2h6"></path>
                                    <path d="M9 12h4"></path>
                                </svg>
                            </span>
                        </div>
                        <div class="col">
                            <div class="font-weight-medium">
                                <x-obelaw-amount :value="$profit" />
                            </div>
                            <div class="text-muted">
                                The total amount of accounts
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        BLADE;
    }
}
