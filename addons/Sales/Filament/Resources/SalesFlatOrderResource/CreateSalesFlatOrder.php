<?php

namespace Obelaw\Sales\Filament\Resources\SalesFlatOrderResource;

use Filament\Resources\Pages\CreateRecord;
use Obelaw\Sales\Filament\Resources\SalesFlatOrderResource;
use Obelaw\Sales\Lib\Services\SalesOrderService;
use Obelaw\Sales\Models\Customer;
use Obelaw\Permit\Facades\Permit;

class CreateSalesFlatOrder extends CreateRecord
{
    protected static string $resource = SalesFlatOrderResource::class;

    /**
     * @param  array<string, mixed>  $data
     * @return array<string, mixed>
     */
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['status_id'] = o_config()->get('sales_default_order_status', 1);

        $data['salesperson_id'] = Permit::user()->id;

        $customer = Customer::find($data['customer_id']);

        $data['customer_name'] = $customer->name;
        $data['customer_phone'] = $customer->phone;
        $data['customer_email'] = $customer->email ?? null;

        // dd($data['items']);

        return $data;
    }

    public function afterCreate()
    {
        $order = SalesOrderService::make()
            ->order($this->getRecord());

        $order->cloneCustomerAddress();

        $order->saveTotals();
    }
}
