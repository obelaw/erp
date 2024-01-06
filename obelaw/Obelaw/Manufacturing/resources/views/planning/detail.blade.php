<div>
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Manufacturing Planning
                    </div>
                    <h2 class="page-title">
                        {{ $plan->name }} - {{ $plan->serial }}
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Orders List</h3>
                        </div>
                        @if (!$plan->orders->isEmpty())
                            <div class="card-table table-responsive">
                                <table class="table table-vcenter">
                                    <thead>
                                        <tr>
                                            <th>Order</th>
                                            <th>Product</th>
                                            <th>Quantity</th>
                                            <th>Dates</th>
                                            <th>Status</th>
                                            <th class="w-1"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($plan->orders as $order)
                                            <tr>
                                                <td>{{ $order->name }}</td>
                                                <td>{{ $order->product->name }}</td>
                                                <td>{{ $order->quantity }}</td>
                                                <td class="text-secondary">
                                                    {{ $order->start_at }} : {{ $order->end_at }}
                                                </td>
                                                <td>{{ $order->status }}</td>
                                                <td>
                                                    <a
                                                        href="{{ route('obelaw.manufacturing.orders.detail', [$order]) }}">
                                                        Detail
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="empty">
                                <div class="empty-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <circle cx="12" cy="12" r="9" />
                                        <line x1="9" y1="10" x2="9.01" y2="10" />
                                        <line x1="15" y1="10" x2="15.01" y2="10" />
                                        <path d="M9.5 15.25a3.5 3.5 0 0 1 5 0" />
                                    </svg>
                                </div>
                                <p class="empty-title">No results found</p>
                                <p class="empty-subtitle text-secondary">
                                    Try adjusting your search or filter to find what you're looking for.
                                </p>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Base info</h3>
                        </div>
                        <div class="card-body">
                            <div class="datagrid">
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Plan Name</div>
                                    <div class="datagrid-content">{{ $plan->name }}</div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Start At</div>
                                    <div class="datagrid-content">{{ $plan->start_at }}</div>
                                </div>

                                <div class="datagrid-item">
                                    <div class="datagrid-title">End At</div>
                                    <div class="datagrid-content">{{ $plan->end_at }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
