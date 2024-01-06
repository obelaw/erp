<?php

namespace Obelaw\Manufacturing\Livewire\Orders;

use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Renderer\FormRender;
use Obelaw\Manufacturing\Models\Order;
use Obelaw\Warehouse\Models\Inventory;

#[Access('manufacturing_orders_create')]
class CreateOrderComponent extends FormRender
{
    public $formId = 'obelaw_manufacturing_order_form';

    protected $pretitle = 'Manufacturing Orders';
    protected $title = 'Create New Order';

    public function product_id_changed()
    {
        // $this->inventory_id = Inventory::where('has_products', true)->get()->map(function ($product) {
        //     return [
        //         'label' => $product->name,
        //         'value' => $product->id,
        //     ];
        // });
        // dd($this->inventory_id);

        $this->emit('setOptions', [
            'toModel' => 'inventory_id',
            'options' => Inventory::where('has_products', true)->get()->map(function ($product) {
                return [
                    'label' => $product->name,
                    'value' => $product->id,
                ];
            }),
        ]);
    }

    public function submit()
    {
        $validateData = $this->validate();

        $order = Order::create($validateData);

        foreach ($validateData['workers'] as $worker) {
            $order->workers()->create([
                'worker_id' => $worker,
            ]);
        }

        if ($plan_id = $validateData['plan']) {
            $order->plan()->create([
                'plan_id' => $plan_id,
                'order_id' => $order->id,
            ]);
        }

        return $this->pushAlert('success', 'The product has been created');
    }
}
