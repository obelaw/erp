<?php

namespace Obelaw\Accounting\Http\Controllers;

use Illuminate\Routing\Controller;
use Obelaw\Accounting\Model\Account;

class HomeController extends Controller
{
    /**
     * Provision a new web server.
     */
    public function __invoke()
    {
        return view('obelaw-accounting::home', [
            'COA' => Account::count(),
        ]);
    }
}
