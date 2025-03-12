<?php

namespace Obelaw\Shipping;

use Obelaw\Shipping\Lib\Services\DeliveryOrderService;
use Obelaw\Shipping\Models\DeliveryOrderAwb;

abstract class Couriers
{
    public function __construct(
        public $account,
        public $DO
    ) {}

    abstract public function ship($address);
    abstract public function printLabel(DeliveryOrderAwb $AWB);
    abstract public function tracking(DeliveryOrderAwb $AWB);
    abstract public function cancel(DeliveryOrderAwb $AWB);

    public function doShip()
    {
        $address = $this->DO->order->address;
        $this->ship($address);
    }

    public function doPrintLabel(DeliveryOrderAwb $AWB)
    {
        $this->printLabel($AWB);
    }

    public function doTracking(DeliveryOrderAwb $AWB)
    {
        $this->tracking($AWB);
    }

    public function doCancel(DeliveryOrderAwb $AWB)
    {
        $this->cancel($AWB);

        $AWB->cancel_at = now();
        $AWB->save();
    }

    protected function accountCredentials($key = null)
    {
        $collection = collect($this->account->credentials)->toArray();

        if (!is_null($key))
            return $collection[$key];

        return $collection;
    }

    protected function setAWB($AWB)
    {
        if (!DeliveryOrderService::make()->isHasAWB($this->DO))
            $this->DO->AWBs()->create([
                'awb' => $AWB,
            ]);
    }
}
