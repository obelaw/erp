<?php

namespace Obelaw\Manufacturing\Livewire\Orders;

use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Renderer\GridRender;
use Obelaw\Framework\Base\Traits\PushAlert;
use Obelaw\Manufacturing\Models\Order;

#[Access('manufacturing_orders_index')]
class IndexOrdersComponent extends GridRender
{
    use PushAlert;

    public $gridId = 'obelaw_manufacturing_orders_index';

    protected $pretitle = 'Manufacturing Orders';
    protected $title = 'Orders Listing';

    #[Access('manufacturing_order_remove')]
    public function removeRow(Order $order)
    {
        $order->delete();
        return $this->pushAlert('success', 'The order has been deleted');
    }
}
