<?php

namespace Obelaw\ERP\Addons\Shipping\Lib\Services;

use Obelaw\ERP\Addons\Shipping\Models\DeliveryOrder;
use Obelaw\ERP\Base\BaseService;

class DeliveryOrderService extends BaseService
{
    public function isHasAWB(DeliveryOrder $deliveryOrder)
    {
        return $deliveryOrder->AWB()->whereNull('cancel_at')->first();
    }
}
