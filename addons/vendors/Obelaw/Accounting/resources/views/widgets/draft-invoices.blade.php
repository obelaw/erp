<div class="card">
    <div class="card-header">
        <h3 class="card-title">Draft Invoices</h3>
    </div>

    @if ($invoices->isEmpty())
        <div class="empty">
            <div class="empty-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-file-invoice">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                    <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                    <path d="M9 7l1 0" />
                    <path d="M9 13l6 0" />
                    <path d="M13 17l2 0" />
                </svg>
            </div>
            <p class="empty-title">Not found invoices in the draft</p>
            <p class="empty-subtitle text-secondary">
                It's nice not to have invoices on the draft list.
            </p>
        </div>
    @endif

    @if ($invoices->isNotEmpty())
        <div class="table-responsive">
            <table class="table table-vcenter card-table table-striped">
                <thead>
                    <tr>
                        <th>Serial</th>
                        <th>Customer</th>
                        <th>Order</th>
                        <th>Grand Total</th>
                        <th class="w-1"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($invoices as $invoice)
                        <tr>
                            <td>{{ $invoice->serial }}</td>
                            <td class="text-secondary">
                                {{ $invoice->order->customer_name }}
                            </td>
                            <td class="text-secondary">
                                <a href="{{ route('obelaw.sales.sales-order.open', [$invoice->order]) }}"
                                    class="text-reset">{{ $invoice->order->serial }}</a>
                            </td>
                            <td class="text-secondary">
                                {{ $invoice->order->grand_total }} @currency
                            </td>
                            <td>
                                <a href="{{ route('obelaw.sales.invoices.open', [$invoice]) }}">Open</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
