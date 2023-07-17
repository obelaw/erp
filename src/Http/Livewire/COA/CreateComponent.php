<?php

namespace Obelaw\Accounting\Http\Livewire\COA;

use Livewire\Component;
use Obelaw\Accounting\Model\Account;
use Obelaw\Accounting\Views\Layout;

class CreateComponent extends Component
{
    public $parent_account;
    public $name;
    public $code;
    public $type;
    public $can_negative_count = false;

    protected $rules = [
        'parent_account' => 'nullable',
        'name' => 'required',
        'code' => 'required',
        'type' => 'required',
        'can_negative_count' => 'nullable',
    ];

    public function render()
    {
        return view('obelaw-accounting::coa.create', [
            'accounts' => Account::get(),
        ])->layout(Layout::class);
    }

    public function submit()
    {
        $this->validate();

        $account = Account::create([
            'parent_account' => $this->parent_account,
            'name' => $this->name,
            'code' => $this->code,
            'type' => $this->type,
            'can_negative_count' => $this->can_negative_count,
        ]);

        dd($account);
    }
}
