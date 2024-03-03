<?php

namespace Obelaw\Purchasing\Livewire\PurchaseOrders;

use Basketin\Component\Cart\Exceptions\QuoteQuantityLimitException;
use Basketin\Component\Cart\Facades\CartManagement;
use Illuminate\Support\Str;
use Livewire\Component;
use Obelaw\Enterprise\SalesQuotations\Models\Quotation;
use Obelaw\Framework\Base\Traits\PushAlert;
use Obelaw\Purchasing\Lib\DTOs\InitItemsDTO;
use Obelaw\Purchasing\Lib\DTOs\InitOrdertDTO;
use Obelaw\Purchasing\Models\Product;
use Obelaw\Purchasing\Models\PurchaseOrder;
use Obelaw\Purchasing\Models\Vendor;
use Obelaw\Purchasing\Support\Facades\Orders;
use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Permissions\Traits\BootPermission;
use Obelaw\UI\Views\Layout\DashboardLayout;

#[Access('sales_sales_order_create')]
class CreatePurchaseOrderComponent extends Component
{
    use BootPermission;
    use PushAlert;

    public $firstClick = 0;
    public $products = null;
    public $basketQuotes = null;
    public $promoCode = null;
    public $AppledpromoCode = null;
    public $subTotal  = 0;
    public $discountTotal = 0;
    public $discountTotalLabel = null;
    public $taxValue = 14;
    public $taxTotal = null;
    public $total = 0;
    public $vendor_id = null;
    public $updateQuantityItem = null;
    public $valueQuantityItem = null;

    private $checkout = null;
    private $cart = null;

    public function boot()
    {
        if ($poCartUlid = session('po_cart_ulid', (string) Str::ulid())) {
            session(['po_cart_ulid' => $poCartUlid]);
        }

        $this->cart = CartManagement::initCart(session('po_cart_ulid')); // <- ULID
    }

    public function mount()
    {
        $this->products = Product::canPurchased()->get();
        $this->basketQuotes = $this->cart->quote()->getQuotes();

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
        ])->layout(DashboardLayout::class);
    }

    // public function applyCoupon()
    // {
    //     $coupon = Coupon::where('coupon_code', $this->promoCode)->first();

    //     if ($coupon->discount_type == 'percentage') {
    //         $this->discountTotalLabel = $coupon->discount_value . '%';
    //         $this->discountTotal = $this->total * $coupon->discount_value / 100;
    //     }

    //     if ($coupon->discount_type == 'fixed') {
    //         $this->discountTotalLabel = $coupon->discount_value . 'EGP';
    //         $this->discountTotal = $this->total - $coupon->discount_value;
    //     }

    //     $this->updateTotals();
    // }

    public function updateTotals()
    {
        try {
            $cart = CartManagement::initCart();

            $this->basketQuotes = $cart->quote()->getQuotes();

            $totals = $cart->totals();

            $this->subTotal =  $totals->getSubTotal();

            $this->taxTotal = ($this->subTotal - $totals->getDiscountTotal()) * 14 / 100;

            $this->total = ($this->subTotal - $this->discountTotal) + $this->taxTotal;
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function addToBacket(Product $product)
    {
        try {
            $this->cart->quote()->addQuote($product);
            $this->basketQuotes = $this->cart->quote()->getQuotes();
            $this->updateTotals();
        } catch (QuoteQuantityLimitException $e) {
            return $this->pushAlert('error', $e->getMessage());
        }
    }

    public function increase(Product $product)
    {
        $this->cart->quote()->increaseQuote($product);
        $this->basketQuotes = $this->cart->quote()->getQuotes();
        $this->updateTotals();
    }

    public function initUpdateQuantity(Product $product)
    {
        $this->updateQuantityItem = $product;
    }

    public function updateQuantity()
    {
        // $product = Product::find($this->updateQuantityItem);
        // dd();
        if ($this->valueQuantityItem == 0) {
            $this->updateQuantityItem->quote()->delete();
            $this->updateQuantityItem = null;
            return false;
        }

        $this->updateQuantityItem->quote->quantity = $this->valueQuantityItem;
        $this->updateQuantityItem->quote->save();

        // $this->updateQuantityItem->quote()->increment('quantity', $this->valueQuantityItem - $this->updateQuantityItem->quote->quantity);
        $this->updateTotals();
        $this->updateQuantityItem = null;
        $this->valueQuantityItem = null;
        // dd($this->updateQ, $this->valueQ, $this->cart);
    }

    public function decrease(Product $product)
    {
        $this->cart->quote()->decreaseQuote($product);
        $this->basketQuotes = $this->cart->quote()->getQuotes();
        $this->updateTotals();
    }

    public function createPO()
    {
        if (!$this->vendor_id) {
            $this->addError('vendor_id', 'Select vendor');

            return $this->pushAlert(
                type: 'error',
                massage: 'Select vendor'
            );
        }

        $order = Orders::create(new InitOrdertDTO(
            vendor_id: $this->vendor_id,
            cart_ulid: $this->cart->getUlid(),
            sub_total: $this->subTotal,
            tax_total: $this->taxTotal,
            grand_total: $this->total,
        ), new InitItemsDTO($this->cart->quote()->getQuotes()));

        if ($order) {
            session()->forget('po_cart_ulid');
        }

        // dd($quotation);

        // return redirect()->route('obelaw.sales.enterprise-quotations.open', [$quotation]);
    }
}
