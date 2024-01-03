@php
    $order = $invoice->order;
@endphp
<div>
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Invoice #{{ $invoice->id }}
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <button type="button" class="btn btn-primary" onclick="javascript:window.print();">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2">
                            </path>
                            <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4"></path>
                            <path d="M7 13m0 2a2 2 0 0 1 2 -2h6a2 2 0 0 1 2 2v4a2 2 0 0 1 -2 2h-6a2 2 0 0 1 -2 -2z">
                            </path>
                        </svg>
                        Print Invoice
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="card card-lg">
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
                            <h1>{{ $invoice->serial }} - <a
                                    href="{{ route('obelaw.accounting.entries.show', [$invoice->entry]) }}">Journal Entry
                                    #{{ $invoice->entry->id }}</a></h1>
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
                                    <p class="strong mb-1">{{ $item->item_name }}</p>
                                    <div class="text-secondary">{{ $item->item_sku }}</div>
                                </td>
                                <td class="text-center">
                                    {{ $item->item_quantity }}
                                </td>
                                <td class="text-end">{{ $item->item_price }} EGP</td>
                                <td class="text-end">{{ $item->item_price * $item->item_quantity }} EGP</td>
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
        </div>
    </div>
</div>
