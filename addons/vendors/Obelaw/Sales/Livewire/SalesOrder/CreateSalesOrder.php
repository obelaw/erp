<?php

namespace Obelaw\Sales\Livewire\SalesOrder;

use Livewire\Component;
use Obelaw\Accounting\Model\PaymentMethod;
use Obelaw\Catalog\Models\Product;
use Obelaw\Contacts\Models\Address;
use Obelaw\ERP\CalculateReceipt;
use Obelaw\Framework\Base\Traits\PushAlert;
use Obelaw\Permissions\Attributes\Access;
use Obelaw\Permissions\Traits\BootPermission;
use Obelaw\Sales\Facades\TempSalesOrders;
use Obelaw\Sales\Models\Coupon;
use Obelaw\Sales\Models\Customer;
use Obelaw\UI\Views\Layout\DashboardLayout;

#[Access('sales_sales_order_create')]
class CreateSalesOrder extends Component
{
    use BootPermission;
    use PushAlert;

    public $orderId;
    public $products = null;
    public $customer_id = null;
    public $adderss_id = null;
    public $payment_method_id = null;
    public $payment_method_reference = null;
    // public $basketQuotes = null;
    public $promoCode = null;
    public $AppledpromoCode = null;
    public $subTotal  = 0;
    public $discountTotal = 0;
    public $discountTotalLabel = null;
    public $taxValue = 0;
    public $taxTotal = null;
    public $total = 0;

    // Configs
    private $configOrdersVat = null;

    public function boot()
    {
        $this->promoCode = $this->order()->getCouponCode();
        $this->discountTotalLabel = $this->order()->getCouponCode();

        $this->payment_method_id = o_config()->get('obelaw.erp.sales.payment_methods.default');

        $this->configOrdersVat = o_config()->get('obelaw.erp.sales.orders.vat', 0);
    }

    public function mount($orderId)
    {
        $this->orderId = $orderId;
        $this->products = Product::canSold()->get();
        $this->customer_id = $this->order()->getCustomerId();

        $this->taxValue = $this->configOrdersVat;
    }

    public function order()
    {
        return TempSalesOrders::getOrderById($this->orderId);
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
            'addersses' => Address::where('contact_id', $this->customer_id)->get()->map(function ($r) {
                return [
                    'label' => $r['label'],
                    'value' => $r['id'],
                ];
            })->toArray(),
            'paymentMethods' => PaymentMethod::where('is_active', true)->get()->map(function ($r) {
                return [
                    'label' => $r['name'],
                    'value' => $r['id'],
                ];
            })->toArray(),
            'basketQuotes' => $this->order()->getProducts(),
            'receipt' => new CalculateReceipt(
                $this->order()->getProductsItems(),
                [
                    [
                        'type' => 'percentage',
                        'value' => $this->configOrdersVat,
                    ]
                ],
                ($this->promoCode) ? [$this->getDiscountCoupon($this->promoCode)] : [],
            ),
        ])->layout(DashboardLayout::class);
    }

    public function applyCoupon()
    {
        $coupon = Coupon::where('coupon_code', $this->promoCode)->first();

        if ($coupon) {
            $this->order()->addCouponCode($this->promoCode);
        }
    }

    public function addToBacket($productId)
    {
        $this->order()->addProduct($productId);
    }

    public function increase($id)
    {
        $this->order()->increaseItem($id);
    }

    public function decrease($id)
    {
        $this->order()->decreaseItem($id);
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

        if (!$this->adderss_id) {
            $this->addError('adderss_id', 'Select adderss');

            return $this->pushAlert(
                type: 'error',
                massage: 'Select customer'
            );
        }

        if (!$this->payment_method_id) {
            $this->addError('payment_method_id', 'Select payment method');

            return $this->pushAlert(
                type: 'error',
                massage: 'Select Payment Method'
            );
        }

        if (!$this->payment_method_reference && o_config()->get('obelaw.erp.sales.payment_methods.reference_required', false)) {
            $this->addError('payment_method_reference', 'Select payment method reference');

            return $this->pushAlert(
                type: 'error',
                massage: 'Select Payment Method Reference'
            );
        }

        $order = $this->order()->plaseOrder($this->adderss_id, [
            'payment_method_id' => $this->payment_method_id,
            'payment_method_reference' => $this->payment_method_reference,
        ]);

        return redirect()->route('obelaw.sales.sales-order.open', [$order]);
    }

    private function getDiscountCoupon($promoCode)
    {
        $coupon = Coupon::where('coupon_code', $promoCode)->first();

        return [
            'type' => $coupon->discount_type,
            'value' => $coupon->discount_value,
        ];
    }
}
