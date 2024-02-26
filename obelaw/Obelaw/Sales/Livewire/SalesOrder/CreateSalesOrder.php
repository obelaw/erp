<?php

namespace Obelaw\Sales\Livewire\SalesOrder;

use Livewire\Component;
use Obelaw\Accounting\Facades\PriceLists;
use Obelaw\Catalog\Models\Product;
use Obelaw\Framework\Base\Traits\PushAlert;
use Obelaw\Sales\Facades\SalesOrders;
use Obelaw\Sales\Facades\VirtualCheckout;
use Obelaw\Sales\Models\Coupon;
use Obelaw\Sales\Models\Customer;
use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Permissions\Traits\BootPermission;
use Obelaw\UI\Views\Layout\DashboardLayout;

#[Access('sales_sales_order_create')]
class CreateSalesOrder extends Component
{
    use BootPermission;
    use PushAlert;

    public $products = null;
    public $customer_id = null;
    public $basketQuotes = null;
    public $promoCode = null;
    public $AppledpromoCode = null;
    public $subTotal  = 0;
    public $discountTotal = 0;
    public $discountTotalLabel = null;
    public $taxValue = 14;
    public $taxTotal = null;
    public $total = 0;

    private $checkout = null;

    public function boot()
    {
        $this->checkout = VirtualCheckout::cartId(1);

        $this->updateTotals();
    }

    public function mount()
    {
        $this->products = Product::canSold()->get();
        $this->basketQuotes = $this->checkout->getItems();
    }

    public function render()
    {
        return view('obelaw-sales::salesorder.create', [
            'customers' => Customer::get()->map(function ($r) {
                return [
                    'label' => $r['name'],
                    'value' => $r['id'],
                ];
            })->toArray(),
        ])->layout(DashboardLayout::class);
    }

    public function applyCoupon()
    {
        $coupon = Coupon::where('coupon_code', $this->promoCode)->first();

        if ($coupon->discount_type == 'percentage') {
            $this->discountTotalLabel = $coupon->discount_value . '%';
            $this->discountTotal = $this->total * $coupon->discount_value / 100;
        }

        if ($coupon->discount_type == 'fixed') {
            $this->discountTotalLabel = $coupon->discount_value . 'EGP';
            $this->discountTotal = $this->total - $coupon->discount_value;
        }

        $this->updateTotals();
    }

    public function updateTotals()
    {
        $this->subTotal = $this->checkout->subTotal();

        $this->taxTotal = ($this->subTotal - $this->discountTotal) * 14 / 100;

        $this->total = ($this->subTotal - $this->discountTotal) + $this->taxTotal;
    }

    public function addToBacket($name, $sku)
    {
        $this->checkout->addItem($name, $sku, PriceLists::getCurrentPriceBySKU($sku));
        $this->basketQuotes = $this->checkout->getItems();
        $this->updateTotals();
    }

    public function increase($id)
    {
        $this->checkout->increase($id);
        $this->basketQuotes = $this->checkout->getItems();
        $this->updateTotals();
    }

    public function decrease($id)
    {
        $this->checkout->decrease($id);
        $this->basketQuotes = $this->checkout->getItems();
        $this->updateTotals();
    }

    public function placeOrder()
    {
        if (!$this->customer_id) {
            $this->addError('customer_id', 'Select customer');

            return $this->pushAlert(
                type: 'error',
                massage: 'Select customer'
            );
        }

        $order = SalesOrders::createSalesOrder([
            'customer_id' => $this->customer_id,
        ], $this->checkout->getItems(), $this->taxTotal, $this->discountTotal);

        return redirect()->route('obelaw.sales.sales-order.open', [$order]);
    }
}
