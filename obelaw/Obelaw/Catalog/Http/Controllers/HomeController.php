<?php

namespace Obelaw\Catalog\Http\Controllers;

use Illuminate\Routing\Controller;
use Obelaw\Catalog\Models\Product;

class HomeController extends Controller
{
    /**
     * Provision a new web server.
     */
    public function __invoke()
    {
        return view('obelaw-catalog::home', [
            'countProducts' => Product::count(),
        ]);
    }
}
