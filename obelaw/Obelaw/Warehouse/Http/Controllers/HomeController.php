<?php

namespace Obelaw\Warehouse\Http\Controllers;

use Illuminate\Routing\Controller;
use Obelaw\Warehouse\Models\Adjustment;
use Obelaw\Warehouse\Models\Place\Inventory;
use Obelaw\Warehouse\Models\Place\Warehouse;
use Obelaw\Warehouse\Models\Transfer;

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
