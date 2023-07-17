<?php

namespace Obelaw\Accounting\Http\Livewire\Entries;

use Livewire\Component;
use Obelaw\Accounting\Model\Account;
use Obelaw\Accounting\Support\COA;
use Obelaw\Accounting\Views\Layout;

class CreateEntryComponent extends Component
{
    public $credit_account;
    public $debit_account;
    public $amount;
    public $description;
    public $added_on;

    protected $rules = [
        'credit_account' => 'required',
        'debit_account' => 'required',
        'amount' => 'required',
        'description' => 'nullable',
        'added_on' => 'nullable',
    ];

    public function render()
    {
        return view('obelaw-accounting::entries.create', [
            'accounts' => Account::get(),
        ])->layout(Layout::class);
    }

    public function submit()
    {
        $this->validate();

        COA::entry(
            $this->credit_account,
            $this->debit_account,
            $this->amount,
            $this->description,
            $this->added_on,
        );
    }
}
