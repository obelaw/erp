<div>
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Order #{{ $order->id }}
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    @if (!$order->bill)
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-team">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-invoice"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                                <path d="M9 7l1 0"></path>
                                <path d="M9 13l6 0"></path>
                                <path d="M13 17l2 0"></path>
                            </svg>
                            Bill It
                        </button>
                    @else
                        <h2 class="page-title">
                            <a href="{{ route('obelaw.purchasing.bills.open', [$order->bill]) }}">
                                {{ $order->bill->serial }}
                            </a>
                        </h2>
                    @endif
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
                            <h1>Pending Invoice</h1>
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
                                    SKU:{{ $item->item_sku }}
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

    <div class="modal modal-blur fade" id="modal-team" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create bill for this order</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3 text-center">
                        <p class="h1">{{ $order->grand_total }} EGP</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Income Account</label>
                        <select type="text" class="form-select" wire:model.defer="income_account">
                            <option value=>Select ...</option>
                            @foreach (\Obelaw\Accounting\Model\Account::get() as $account)
                                <option value="{{ $account->id }}">{{ $account->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" wire:click="billIt">Create bill</button>
                </div>
            </div>
        </div>
    </div>
</div>
