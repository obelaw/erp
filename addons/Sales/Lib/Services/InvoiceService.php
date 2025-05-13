<?php

namespace Obelaw\Sales\Lib\Services;

use LaravelDaily\Invoices\Classes\InvoiceItem;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Facades\Invoice as LaravelDailyInvoice;
use Obelaw\Accounting\Lib\Services\JournalEntryService;
use Obelaw\Sales\Models\SalesInvoice;
use Obelaw\Flow\Base\BaseService;

class InvoiceService extends BaseService
{
    public function post(SalesInvoice $invoice)
    {
        throw_if(!is_null($invoice->transaction_id), 'This invoice has been posted');

        $journalEntry = JournalEntryService::make()->init();

        $accountReceivable = oconfig()->get('invoice_default_account_receivable');
        throw_if(is_null($accountReceivable), 'A default account receivable must be selected.');

        $accountPproductSales = oconfig()->get('invoice_default_account_product_sales');
        throw_if(is_null($accountPproductSales), 'A default account product sales must be selected.');

        $journalEntry->debitLine($accountReceivable, amount: $invoice->order->grand_total);
        $journalEntry->creditLine($accountPproductSales, $invoice->order->grand_total);

        $journalEntry->audit();

        $transaction = $journalEntry->createTransaction(now(), 'Invoice #' . $invoice->id);

        $invoice->transaction_id = $transaction->id;
        $invoice->status = 'posted';
        $invoice->save();

        return $transaction;
    }

    public function print(SalesInvoice $invoice)
    {
        $items = $invoice->order->items;

        $_items = [];
        foreach ($items as $item) {
            $_items[] = InvoiceItem::make($item->name)
                ->description($item->sku)
                ->pricePerUnit($item->unit_price)
                ->quantity($item->quantity);
        }

        // dd($item, $_items);

        // dd($invoice->order->customer);
        $client = new Party([
            'name' => "GOOGLE",
            'custom_fields' => [
                'phone' => $invoice->order->customer->phone,
                'email' => $invoice->order->customer->email,
            ],
        ]);

        $customer = new Party([
            'name' => $invoice->order->customer->name,
            'custom_fields' => [
                'phone' => $invoice->order->customer->phone,
                'email' => $invoice->order->customer->email,
            ],
        ]);

        $invoice = LaravelDailyInvoice::make()
            ->status(__('invoices::invoice.due'))
            ->date(now()->subWeeks(3))
            ->series($invoice->serial)
            ->serialNumberFormat('{SERIES}')
            ->seller($client)
            ->buyer($customer)
            ->currencySymbol('EGP')
            ->currencyCode('EGP')
            ->currencyFormat('{SYMBOL} {VALUE}')
            ->discountByPercent(10)
            ->taxRate(15)
            ->shipping(1.99)
            ->logo(public_path('astro-logo-dark.png'))
            ->addItems($_items);

        return $invoice->stream();
    }
}
