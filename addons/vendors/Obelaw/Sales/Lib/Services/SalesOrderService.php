<?php

namespace Obelaw\Sales\Lib\Services;

use Exception;
use Illuminate\Support\Facades\DB;
use Obelaw\Accounting\Facades\Entries;
use Obelaw\Accounting\Lib\Repositories\AccountRepositoryInterface;
use Obelaw\ERP\Facades\Management;
use Obelaw\Framework\Base\ServiceBase;
use Obelaw\Sales\Lib\Repositories\CustomerRepositoryInterface;
use Obelaw\Sales\Lib\Repositories\SalesOrderRepositoryInterface;
use Obelaw\Sales\Models\SalesFlatOrder;

class SalesOrderService extends ServiceBase
{
    public function __construct(
        public CustomerRepositoryInterface $customerRepository,
        public SalesOrderRepositoryInterface $salesOrderRepository,
        public AccountRepositoryInterface $accountRepository,
    ) {
    }

    public function createNewOrder($orderData, array $paymentMethod, $addressData, $items)
    {
        DB::beginTransaction();

        try {
            $orderData['payment_method_id'] = $paymentMethod['payment_method_id'];
            $orderData['payment_method_reference'] = $paymentMethod['payment_method_reference'];

            $order = SalesFlatOrder::create($orderData);

            $order->address()->create($addressData);

            if (count($items) == 0) {
                throw new Exception('Not Found Item');
            }

            foreach ($items as $item) {
                $order->items()->create([
                    'name'      => $item['name'],
                    'sku'       => $item['sku'],
                    'quantity'  => $item['quantity'],
                    'sub_total' => $item['sub_total'],
                ]);
            }

            DB::commit();

            return $order;
        } catch (\Throwable $th) {
            DB::rollback();
            //throw $th;
        }
    }

    public function invoiceIt($order)
    {
        if (!$this->salesOrderRepository->canInvoice($order->id))
            dd(114);

        return $this->salesOrderRepository->createInvoice($order->id);
    }

    public function postInvoice($invoice, $incomeAccountId)
    {
        $entry = Entries::init();

        // dd(AR::getJournalAccount($invoice->order->customer_id));

        $entry->debitLine(
            accountId: Management::sales()->customers()->getARJournalAccount($invoice->order->customer_id),
            amount: $invoice->order->grand_total
        );

        if ($invoice->order->discount_total != 0)
            $entry->debitLine(
                accountId: $this->customerRepository->find($invoice->order->customer_id)->journal->account_receivable,
                amount: $invoice->order->discount_total
            );

        $entry->creditLine(accountId: $incomeAccountId, amount: $invoice->order->sub_total);

        if ($invoice->order->tax_total != 0)
            $entry->creditLine(
                accountId: o_config()->get('obelaw.erp.sales.customers.default.account.tax'),
                amount: $invoice->order->tax_total
            );

        $entry->audit();

        $entry = $entry->create();

        return $this->salesOrderRepository->postInvoice($invoice, $entry->id);
    }
}
