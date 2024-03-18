<div>
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Adjustments
                    </div>
                    <h2 class="page-title">
                        Adjustment: #{{ $adjustment->id }}
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Adjustment info</h3>
                    <div class="card-actions">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clock-hour-10"
                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                            <path d="M12 12l-3 -2"></path>
                            <path d="M12 7v5"></path>
                        </svg>
                        {{ $adjustment->created_at->format('d M Y - H:i:s') }}
                    </div>
                </div>
                <div class="card-body">
                    <div class="datagrid mb-3">
                        {{-- <div class="datagrid-item">
                            <div class="datagrid-title">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-transfer-out" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M4 19v2h16v-14l-8 -4l-8 4v2"></path>
                                    <path d="M13 14h-9"></path>
                                    <path d="M7 11l-3 3l3 3"></path>
                                </svg>
                                Transfer id
                            </div>
                            <div class="datagrid-content">#{{ $adjustment->transfer->id }}</div>
                        </div> --}}

                        <div class="datagrid-item">
                            <div class="datagrid-title">Adjustment quantity</div>
                            <div class="datagrid-content">{{ $adjustment->quantity }}</div>
                        </div>
                    </div>

                    <div class="datagrid">
                        <div class="datagrid-item">
                            <div class="datagrid-title">Adjustment SKU</div>
                            <div class="datagrid-content">{{ $adjustment->sku }}</div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Adjustment description</div>
                            <div class="datagrid-content">
                                {{ $adjustment->description ?? '-' }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
