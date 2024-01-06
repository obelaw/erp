<?php

namespace Obelaw\Warehouse\Http\Controllers;

use Illuminate\Routing\Controller;
use Obelaw\Warehouse\Models\Adjustment;
use Obelaw\Warehouse\Models\Inventory;
use Obelaw\Warehouse\Models\Transfer;
use Obelaw\Warehouse\Models\Warehouse;

class HomeController extends Controller
{
    /**
     * Provision a new web server.
     */
    public function __invoke()
    {
        return view('obelaw-warehouse::home', [
            'countWarehouses' => Warehouse::count(),
            'countInventories' => Inventory::count(),
            'countTransfers' => Transfer::count(),
            'countAdjustments' => Adjustment::count(),
        ]);
    }
}
