<?php

namespace Obelaw\Sales\Classes;

use Obelaw\Configs\Classes\ConfigsClass;

class SalesManagement
{
    public function __construct(public ConfigsClass $configs)
    {
    }

    public function customers()
    {
        return app('sales.customer.management', ['configs' => $this->configs]);
    }

    public function tempSalesOrders()
    {
        return app('sales.temp.salesorders', ['configs' => $this->configs]);
    }
}
