<?php

namespace Obelaw\Sales\Lib\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Obelaw\Contacts\Models\Address;
use Obelaw\ERP\CalculateReceipt;
use Obelaw\Framework\Base\ServiceBase;
use Obelaw\Sales\Lib\Services\SalesOrderService;
use Obelaw\Sales\Models\Coupon;
use Obelaw\Sales\Models\TempSalesOrder;

class TempSalesOrderService extends ServiceBase
{
    private $order = null;

    public function __construct()
    {
    }

    public function createOrGetOrder(int|null $customer_id = null)
    {
        return TempSalesOrder::firstOrCreate([
            'admin_id' => Auth::guard('obelaw')->user()->id,
            'customer_id' => $customer_id,
        ], [
            'admin_id' => Auth::guard('obelaw')->user()->id,
            'customer_id' => $customer_id,
        ]);
    }

    public function getOrderById($id)
    {
        $this->order = TempSalesOrder::findOrFail($id);
        return $this;
    }

    public function getCustomerId()
    {
        return $this->order->customer_id;
    }

    public function addProduct($productId, $quantity = 1)
    {
        return $this->order->items()->updateOrCreate([
            'product_id' => $productId,
        ], [
            'product_id' => $productId,
            'item_quantity' => DB::raw('item_quantity + ' . $quantity)
        ]);
    }

    public function getProducts()
    {
        return $this->order->items;
    }

    public function getProductsItems()
    {
        return $this->order->items()->with('product')->get()->map(function ($item) {
            return [
                'quantity' => $item->item_quantity,
                'price' => $item->product->price_sales,
            ];
        })->toArray();
    }

    public function increaseItem($productId)
    {
        return $this->order->items->find($productId)->increment('item_quantity', 1);
    }

    public function decreaseItem($productId)
    {
        $q = $this->order->items->find($productId);

        if ($q->item_quantity == 1)
            return $q->delete();

        return $q->decrement('item_quantity', 1);
    }

    public function addCouponCode($couponCode)
    {
        $this->order->coupon_code = $couponCode;
        $this->order->save();

        return true;
    }

    public function getCouponCode()
    {
        return $this->order->coupon_code;
    }

    public function plaseOrder($adderssId)
    {
        $coupon = Coupon::where('coupon_code', $this->getCouponCode())->first();
        $address = Address::find($adderssId);

        $receipt = new CalculateReceipt(
            $this->getProductsItems(),
            [
                [
                    'type' => 'percentage',
                    'value' => 14,
                ]
            ],
            [
                [
                    'type' => $coupon->discount_type,
                    'value' => $coupon->discount_value,
                ]
            ]
        );

        $salesOrder = new SalesOrderService;
        return $salesOrder->createNewOrder([
            'temp_order_id' => $this->order->id,
            'sub_total' => $receipt->getSubTotal(),
            'discount_total' => $receipt->getTotalDiscounts(),
            // 'shipping_total' => null,
            'tax_total' => $receipt->getTotalTaxs(),
            'grand_total' => $receipt->getTotal(),
            'customer_id' => $this->order->customer_id,
            'customer_name' => $this->order->customer->name,
            'customer_phone' => $this->order->customer->phone,
            'customer_email' => $this->order->customer->email,
        ], [
            'country_id' => $address->country_id,
            'city_id' => $address->city_id,
            'state_id' => $address->state_id,
            'area_id' => $address->area_id,
            'postcode' => $address->postcode,
            'street_line_1' => $address->street_line_1,
            'street_line_2' => $address->street_line_2,
            'phone_number' => $address->phone_number,
        ], $this->order->items()->with('product')->get()->map(function ($item) {
            return [
                'name' => $item->product->name,
                'sku' => $item->product->sku,
                'quantity' => $item->item_quantity,
                'sub_total' => ($item->product->price_sales * $item->item_quantity),
            ];
        })->toArray());
    }
}
