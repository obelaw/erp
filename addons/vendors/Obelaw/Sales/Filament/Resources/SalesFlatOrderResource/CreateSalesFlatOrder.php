<?php

namespace Obelaw\Sales\Filament\Resources\SalesFlatOrderResource;

use Filament\Resources\Pages\CreateRecord;
use Obelaw\Sales\Filament\Resources\SalesFlatOrderResource;
use Obelaw\Sales\Models\Customer;

class CreateSalesFlatOrder extends CreateRecord
{
    protected static string $resource = SalesFlatOrderResource::class;

    /**
     * @param  array<string, mixed>  $data
     * @return array<string, mixed>
     */
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['admin_id'] = 1;

        $customer = Customer::find($data['customer_id']);

        $data['customer_name'] = $customer->name;
        $data['customer_phone'] = $customer->phone;
        $data['customer_email'] = $customer->email ?? null;

        // dd($data['items']);

        return $data;
    }
}
