<?php

namespace Obelaw\Accounting\Livewire\Reporting;

use Illuminate\Support\Carbon;
use Livewire\Component;
use Obelaw\Accounting\Model\Account;
use Obelaw\Accounting\Model\AccountEntry;
use Obelaw\Accounting\Model\AccountEntryAmount;
use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Permissions\Traits\BootPermission;
use Obelaw\UI\Views\Layout\DashboardLayout;

#[Access('accounting_reporting_coa')]
class TheGLReporting extends Component
{
    use BootPermission;

    public $accounts = null;
    public $account_id = null;
    public $date_from = null;
    public $date_to = null;

    public function mount()
    {
        $this->accounts = Account::get();

        $this->date_from = Carbon::now()->subMonth()->format('Y-m-d');
        $this->date_to = Carbon::now()->format('Y-m-d');
    }

    public function render()
    {
        $entryDebits = AccountEntryAmount::where('account_id', $this->account_id)->where('type', 'debit')->whereBetween('created_at', [$this->date_from, $this->date_to])->with(['credits'])->get();
        $entryCredits = AccountEntryAmount::where('account_id', $this->account_id)->where('type', 'credit')->whereBetween('created_at', [$this->date_from, $this->date_to])->with(['debits'])->get();

        // dd($entryDebits, $entryCredits);

        // $entrys = AccountEntryAmount::whereIn('entry_id', $entryIds)
        //     ->with('account')
        //     ->groupBy('type')
        //     ->get('type');

        // dd($entrys);

        return view('obelaw-accounting::reporting.gl', [
            'entryDebits' => $entryDebits,
            'entryCredits' => $entryCredits,
        ])->layout(DashboardLayout::class);
    }

    public function submitFilter()
    {
    }
}
