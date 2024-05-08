<?php

namespace Obelaw\Sales\Lib\Services;

use Exception;
use Illuminate\Support\Facades\DB;
use Obelaw\Framework\Base\ServiceBase;
use Obelaw\Sales\Models\SalesFlatOrder;

class SalesOrderService extends ServiceBase
{
    public function createNewOrder($orderData, $addressData, $items)
    {
        DB::beginTransaction();

        try {
            $order = SalesFlatOrder::create($orderData);

            $order->address()->create($addressData);

            if (count($items) == 0) {
                throw new Exception('Not Found Item');
            }

            foreach ($items as $item) {
                $order->items()->create([
                    'name'      => $item['name'],
                    'sku'       => $item['sku'],
                    'quantity'  => $item['quantity'],
                    'sub_total' => $item['sub_total'],
                ]);
            }

            DB::commit();

            return $order;
        } catch (\Throwable $th) {
            DB::rollback();
            //throw $th;
        }
    }
}
