<div class="">
    <div class="card-body">
        <div class="row">
            <div class="col-6">
                <p class="h3">{{ o_config()->get('obelaw.erp.sales.invoice.header.company_name') }}</p>
                <address>
                    {{ o_config()->get('obelaw.erp.sales.invoice.header.line_1') }}<br>
                    {{ o_config()->get('obelaw.erp.sales.invoice.header.line_2') }}<br>
                    {{ o_config()->get('obelaw.erp.sales.invoice.header.line_3') }}<br>
                    {{ o_config()->get('obelaw.erp.sales.invoice.header.line_4') }}
                </address>
            </div>
            <div class="col-6 text-end">
                <p class="h3">Client</p>
                <address>
                    {{ $order->customer_name }}<br>
                    {{ $order->customer_phone }}<br>
                    {{ $order->customer_email ?? '' }}
                </address>
            </div>
            <div class="col-12 my-5">
                <h1>Pending Invoice</h1>
            </div>
        </div>
        <table class="table table-transparent table-responsive">
            <thead>
                <tr>
                    <th class="text-center" style="width: 1%"></th>
                    <th>Product</th>
                    <th class="text-center" style="width: 1%">Qnt</th>
                    <th class="text-end" style="width: 20%">Unit</th>
                    <th class="text-end" style="width: 20%">Amount</th>
                </tr>
            </thead>
            @foreach ($order->items as $item)
                <tr>
                    <td class="text-center">{{ $loop->index + 1 }}</td>
                    <td>
                        <p class="strong mb-1">{{ $item->name }}</p>
                        SKU:{{ $item->sku }}
                    </td>
                    <td class="text-center">
                        {{ $item->quantity }}
                    </td>
                    <td class="text-end">{{ $item->sub_total / $item->quantity }} EGP</td>
                    <td class="text-end">{{ $item->sub_total }} EGP</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="4" class="strong text-end">Sub Total</td>
                <td class="text-end">{{ $order->sub_total }} EGP</td>
            </tr>
            <tr>
                <td colspan="4" class="strong text-end">Discount Total</td>
                <td class="text-end">{{ $order->discount_total }} EGP</td>
            </tr>
            <tr>
                <td colspan="4" class="strong text-end">Vat</td>
                <td class="text-end">{{ $order->tax_total }} EGP -
                    ({{ ($order->tax_total / $order->sub_total) * 100 }}%)</td>
            </tr>
            <tr>
                <td colspan="4" class="font-weight-bold text-uppercase text-end">Grand Total</td>
                <td class="font-weight-bold text-end">{{ $order->grand_total }} EGP</td>
            </tr>
        </table>
        <p class="text-secondary text-center mt-5">{{ o_config()->get('obelaw.erp.sales.invoice.footer.message') }}</p>
    </div>
</div>
