@php
    $order = $invoice->order;
@endphp

<div class="">
    <div class="card-body">
        <div class="row">
            <div class="col-6">
                <p class="h3">Company</p>
                <address>
                    Street Address<br>
                    State, City<br>
                    Region, Postal Code<br>
                    ltd@example.com
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
                <h1>{{ $invoice->serial }}</h1>
            </div>
        </div>
        <table class="table table-transparent table-responsive">
            <thead>
                <tr>
                    <th class="text-center" style="width: 1%"></th>
                    <th>Product</th>
                    <th class="text-center" style="width: 1%">Qnt</th>
                    <th class="text-end" style="width: 10%">Unit</th>
                    <th class="text-end" style="width: 10%">Amount</th>
                </tr>
            </thead>
            @foreach ($order->items as $item)
                <tr>
                    <td class="text-center">{{ $loop->index + 1 }}</td>
                    <td>
                        <p class="strong mb-1">{{ $item->name }}</p>
                        <div class="text-secondary">{{ $item->sku }}</div>
                    </td>
                    <td class="text-center">
                        {{ $item->quantity }}
                    </td>
                    <td class="text-end">{{ $item->sub_total }} EGP</td>
                    <td class="text-end">{{ $item->sub_total / $item->quantity }} EGP</td>
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
                <td colspan="4" class="strong text-end">Vat Rate</td>
                <td class="text-end">14%</td>
            </tr>
            <tr>
                <td colspan="4" class="strong text-end">Vat Due</td>
                <td class="text-end">{{ $order->tax_total }} EGP</td>
            </tr>
            <tr>
                <td colspan="4" class="font-weight-bold text-uppercase text-end">Grand Total</td>
                <td class="font-weight-bold text-end">{{ $order->grand_total }} EGP</td>
            </tr>
        </table>
        <p class="text-secondary text-center mt-5">Thank you very much for doing business with us. We look
            forward to working with
            you again!</p>
    </div>
</div>
