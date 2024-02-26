<?php

namespace Obelaw\Sales\Services;

use Illuminate\Support\Facades\DB;
use Obelaw\Accounting\DTO\Account\GetAccountByCodeDTO;
use Obelaw\Accounting\DTO\Entry\AmountEntryDTO;
use Obelaw\Accounting\DTO\Entry\CreateEntryDTO;
use Obelaw\Accounting\Facades\Accounts;
use Obelaw\Accounting\Facades\Entries;
use Obelaw\Sales\Models\Customer;
use Obelaw\Sales\Repositories\SalesOrderRepository;

class SalesOrderService
{
    public function __construct(
        public SalesOrderRepository $salesOrderRepository,
    ) {
    }

    public function getAllContacts()
    {
        return $this->salesOrderRepository->getAllContacts();
    }

    public function getSalesOrderById($orderId)
    {
        return $this->salesOrderRepository->getSalesOrderById($orderId);
    }

    public function deleteSalesOrder($orderId)
    {
        return $this->salesOrderRepository->deleteSalesOrder($orderId);
    }

    public function createSalesOrder($salesOrderDetails, $salesOrderItems, $taxValue = null, $discountTotal = null)
    {
        DB::beginTransaction();

        try {
            $salesOrder = $this->salesOrderRepository->createSalesOrder($salesOrderDetails);

            foreach ($salesOrderItems as $item) {
                $salesOrder->items()->create([
                    'item_name' => $item['name'],
                    'item_sku' => $item['sku'],
                    'item_price' => $item['price'],
                    'item_discount_price' => null,
                    'item_quantity' => $item['quantity'],
                ]);
            }

            $subTotal = $salesOrder->items->map(function ($item) {
                return $item->item_discount_price ?? $item->item_price * $item->item_quantity;
            })->sum();

            $salesOrder->sub_total = $subTotal;
            $salesOrder->discount_total = $discountTotal;
            $salesOrder->tax_total = $taxValue;
            $salesOrder->grand_total = ($subTotal - $discountTotal ?? 0) + $taxValue;
            $salesOrder->save();

            DB::commit();

            return $salesOrder;
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function updateContact($orderId, array $newDetails)
    {
        return $this->salesOrderRepository->updateContact($orderId, $newDetails);
    }

    public function createEntry(CreateEntryDTO $createEntryDTO, $debit, $credit, $tax)
    {
        $entry = Entries::create($createEntryDTO);

        Entries::credit($credit($entry));
        Entries::credit($tax($entry));
        Entries::debit($debit($entry));

        return $entry;
    }

    public function invoiceIt($order, $incomeAccountId)
    {
        if ($this->salesOrderRepository->canInvoice($order->id)) {
            $entry = $this->createEntry(new CreateEntryDTO(
                now(),
                'description'
            ), function ($entry) use ($order) {
                return new AmountEntryDTO(
                    $entry,
                    Customer::find($order->customer_id)->journal->account_receivable,
                    $order->grand_total,
                );
            }, function ($entry) use ($order, $incomeAccountId) {
                return new AmountEntryDTO(
                    $entry,
                    $incomeAccountId,
                    $order->sub_total,
                );
            }, function ($entry) use ($order) {
                return new AmountEntryDTO(
                    $entry,
                    Accounts::getByCode(new GetAccountByCodeDTO('TAX'))->id,
                    $order->tax_total,
                );
            });

            return $this->salesOrderRepository->createInvoice($order->id, $entry->id);
        }
    }
}
