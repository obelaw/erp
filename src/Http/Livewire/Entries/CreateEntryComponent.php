<?php

namespace Obelaw\Accounting\Http\Livewire\Entries;

use Livewire\Component;
use Obelaw\Accounting\Lib\Entry;
use Obelaw\Accounting\Model\Account;
use Obelaw\Framework\Base\Traits\PushAlert;
use Obelaw\Framework\Views\Layout\DashboardLayout;

class CreateEntryComponent extends Component
{
    use PushAlert;
    
    public $added_on = null;

    public $account;
    public $type;
    public $amount;
    public $description = null;

    public $items = [];

    public $debitSum = 0;
    public $creditSum = 0;

    private Entry $entry;

    public function boot(Entry $entry)
    {
        $this->entry = $entry;
    }

    public function mount()
    {
        $this->added_on = date('Y-m-d');
    }

    public function render()
    {
        return view('obelaw-accounting::entries.create', [
            'accounts' => Account::get(),
        ])->layout(DashboardLayout::class);
    }

    public function addEntry()
    {
        $item = $this->validate([
            'account' => 'required',
            'type' => 'required',
            'amount' => 'required',
        ]);

        if (!$accountCheck = Account::whereCode($item)->first()) {
            $this->pushAlert('error', 'Account is not found');
        }

        if (!$accountCheck->rules()->canNegativeCount && $accountCheck->amount < $item['amount'] && $item['type'] == 'debit') {
            $this->pushAlert('error', 'It is not allowed to enter more than what is available in the account');
        }

        array_push($this->items, $item);

        $items = collect($this->items);
        $this->debitSum = $items->where('type', 'debit')->sum('amount');
        $this->creditSum = $items->where('type', 'credit')->sum('amount');

        $this->reset([
            'account',
            'type',
            'amount',
            'description'
        ]);

        $this->type = ($this->type == 'debit') ? 'debit' : 'credit';
        $this->amount = $this->debitSum - $this->creditSum;

        if ($this->amount == 0) {
            $this->type = null;
        }




        // COA::entry(
        //     $this->credit_account,
        //     $this->debit_account,
        //     $this->amount,
        //     $this->description,
        //     $this->added_on,
        // );
    }

    public function removeEntry($index)
    {
        // dd($index);

        unset($this->items[$index]);

        $items = collect($this->items);
        $this->debitSum = $items->where('type', 'debit')->sum('amount');
        $this->creditSum = $items->where('type', 'credit')->sum('amount');

        $this->type = ($this->type == 'debit') ? 'debit' : 'credit';
        $this->amount = $this->debitSum - $this->creditSum;

        if ($this->amount == 0) {
            $this->type = null;
        }
    }

    public function submit()
    {
        $entry = $this->entry->create($this->added_on, $this->description);

        foreach ($this->items as $item) {
            if ($item['type'] == 'debit') {
                $entry->debit($item['account'], $item['amount']);
            }

            if ($item['type'] == 'credit') {
                $entry->credit($item['account'], $item['amount']);
            }
        }
    }
}
