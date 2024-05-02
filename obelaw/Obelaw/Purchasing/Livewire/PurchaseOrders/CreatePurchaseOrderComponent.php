<?php

namespace Obelaw\Purchasing\Livewire\PurchaseOrders;

use Livewire\Component;
use Obelaw\ERP\CalculateReceipt;
use Obelaw\Framework\Base\Traits\PushAlert;
use Obelaw\Purchasing\Models\Product;
use Obelaw\Purchasing\Models\PurchaseOrder;
use Obelaw\Purchasing\Models\Vendor;
use Obelaw\Purchasing\Support\Facades\Orders;
use Obelaw\Permissions\Attributes\Access;
use Obelaw\Permissions\Traits\BootPermission;
use Obelaw\UI\Views\Layout\DashboardLayout;

#[Access('sales_sales_order_create')]
class CreatePurchaseOrderComponent extends Component
{
    use BootPermission;
    use PushAlert;

    public $products = null;
    public $basketQuotes = null;
    public $subTotal  = 0;
    public $taxTotal = null;
    public $taxValue = '14';
    public $total = 0;
    public $vendor_id = null;
    public $tax = 14;
    public $updateQuantityItem = null;
    public $valueQuantityItem = null;
    public $mangerCurrentPO = null;

    public function mount(PurchaseOrder $order)
    {
        $this->mangerCurrentPO = $order;
        $this->vendor_id = $order->vendor_id;

        $this->products = Product::canPurchased()->get();

        $this->basketQuotes = $order->items;

        $this->updateTotals();
    }

    public function render()
    {
        return view('obelaw-purchasing::purchase-order.create', [
            'vendors' => Vendor::get()->map(function ($r) {
                return [
                    'label' => $r['name'],
                    'value' => $r['id'],
                ];
            })->toArray(),
            'taxes' => [
                [
                    'label' => 'Vat 14%',
                    'value' => 14,
                ]
            ],
        ])->layout(DashboardLayout::class);
    }

    public function updateTotals()
    {
        $this->basketQuotes = Orders::manger($this->mangerCurrentPO)->getItems();

        $CR = new CalculateReceipt(Orders::manger($this->mangerCurrentPO)->getItemsForCalculate(), [
            [
                'type' => 'percent',
                'value' => 14,
            ]
        ]);

        $this->subTotal = $CR->getSubTotal();
        $this->taxTotal = $CR->getTotalTaxs();
        $this->total = $CR->getTotal();
    }

    public function addToBacket(Product $product)
    {
        Orders::manger($this->mangerCurrentPO)->addItem($product);

        $this->updateTotals();
    }

    public function increase(Product $product)
    {
        Orders::manger($this->mangerCurrentPO)->increase($product);

        $this->updateTotals();
    }

    public function initUpdateQuantity(Product $product)
    {
        $this->updateQuantityItem = $product;
    }

    public function updateQuantity()
    {
        Orders::manger($this->mangerCurrentPO)->updateQuantity($this->updateQuantityItem, $this->valueQuantityItem);

        $this->updateTotals();
        $this->updateQuantityItem = null;
        $this->valueQuantityItem = null;
    }

    public function decrease(Product $product)
    {
        Orders::manger($this->mangerCurrentPO)->decrease($product);

        $this->updateTotals();
    }

    public function createPO()
    {
        $o = Orders::create($this->mangerCurrentPO);

        redirect()->route('obelaw.purchasing.po.open', [$o]);
    }
}
