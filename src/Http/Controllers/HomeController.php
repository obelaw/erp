<?php

namespace Obelaw\Accounting\Http\Controllers;

use Illuminate\Routing\Controller;
use Obelaw\Accounting\Model\Account;
use Obelaw\Accounting\Model\AccountEntryAmount;

class HomeController extends Controller
{
    /**
     * Provision a new web server.
     */
    public function __invoke()
    {
        $debitSum = AccountEntryAmount::whereType('debit')->sum('amount');
        $creditSum = AccountEntryAmount::whereType('credit')->sum('amount');

        return view('obelaw-accounting::home', [
            'COA' => Account::count(),
            'profit' => $debitSum - $creditSum,
        ]);
    }
}
