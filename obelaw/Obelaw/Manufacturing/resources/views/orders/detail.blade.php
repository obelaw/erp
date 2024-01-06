<div>
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Manufacturing Orders
                    </div>
                    <h2 class="page-title">
                        {{ $order->name }} - {{ $order->serial }}
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
                            <h3 class="card-title">Base info</h3>
                        </div>
                        <div class="card-body">
                            <div class="datagrid">
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Order Name</div>
                                    <div class="datagrid-content">{{ $order->name }}</div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Order Reference</div>
                                    <div class="datagrid-content">{{ $order->serial }}</div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Order Product</div>
                                    <div class="datagrid-content">{{ $order->product->name }} -
                                        ({{ $order->product->serial }})</div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Order Inventory</div>
                                    <div class="datagrid-content">{{ $order->inventory->name }} -
                                        ({{ $order->inventory->code }})</div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Order Quantity</div>
                                    <div class="datagrid-content">{{ $order->quantity }}</div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Total Cost</div>
                                    <div class="datagrid-content">{{ $order->quantity * $totalCost }} @currency</div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Start At</div>
                                    <div class="datagrid-content">{{ $order->start_at }}</div>
                                </div>

                                <div class="datagrid-item">
                                    <div class="datagrid-title">End At</div>
                                    <div class="datagrid-content">{{ $order->end_at }}</div>
                                </div>

                                {{-- <div class="datagrid-item">
                                    <div class="datagrid-title">Icon</div>
                                    <div class="datagrid-content">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon text-green" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M5 12l5 5l10 -10" />
                                        </svg>
                                        Checked
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card card-sm">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">

                                    @if ($order->status == 'padding' || $order->status == 'pause')
                                        <button class="btn btn-green btn-icon" wire:click="updateStatus('running')">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-player-play" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M7 4v16l13 -8z"></path>
                                            </svg>
                                        </button>
                                    @endif

                                    @if ($order->status == 'running')
                                        <button class="btn btn-yellow btn-icon" wire:click="updateStatus('pause')">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-player-pause" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path
                                                    d="M6 5m0 1a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1v12a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1z">
                                                </path>
                                                <path
                                                    d="M14 5m0 1a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1v12a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1z">
                                                </path>
                                            </svg>
                                        </button>
                                    @endif

                                    @if ($order->status == 'running' || $order->status == 'pause')
                                        <button class="btn btn-red btn-icon" wire:click="updateStatus('complete')">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-player-stop" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path
                                                    d="M5 5m0 2a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2z">
                                                </path>
                                            </svg>
                                        </button>
                                    @endif

                                    @if ($order->status == 'complete')
                                        <button class="btn btn-green btn-icon" wire:click="moveToStock()">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-check" width="24" height="24"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M5 12l5 5l10 -10"></path>
                                            </svg>
                                        </button>
                                    @endif

                                </div>
                                <div class="col">
                                    <div class="font-weight-medium">
                                        {{ $order->status }}
                                    </div>
                                    <div class="text-secondary">
                                        12 waiting payments
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
