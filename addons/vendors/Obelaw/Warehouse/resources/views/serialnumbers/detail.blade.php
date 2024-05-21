<div>
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Serial Numbers
                    </div>
                    <h2 class="page-title">
                        {{ $item->product->name }} - {{ $item->serial }}
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
                            <h3 class="card-title">Base Info</h3>
                        </div>
                        <div class="card-body">
                            <div class="datagrid">
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Ulid</div>
                                    <div class="datagrid-content">{{ $item->ulid }}</div>
                                </div>

                                <div class="datagrid-item">
                                    <div class="datagrid-title">Current Inventory</div>
                                    <div class="datagrid-content">{{ $item->inventory->name }}
                                        (#{{ $item->inventory->code }})</div>
                                </div>

                                <div class="datagrid-item">
                                    <div class="datagrid-title">Status</div>
                                    <div class="datagrid-content">{{ $item->status }}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-header">
                            <h3 class="card-title">Product Info</h3>
                        </div>
                        <div class="card-body">
                            <div class="datagrid">
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Serial</div>
                                    <div class="datagrid-content">{{ $item->product->serial }}</div>
                                </div>

                                <div class="datagrid-item">
                                    <div class="datagrid-title">Product Name</div>
                                    <div class="datagrid-content">{{ $item->product->name }}</div>
                                </div>

                                <div class="datagrid-item">
                                    <div class="datagrid-title">Product SKU</div>
                                    <div class="datagrid-content">{{ $item->product->sku }}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if ($item->sold != 'sold')
                        <div class="card mt-3">
                            <div class="card-header">
                                <h3 class="card-title">Inventory Info</h3>
                            </div>
                            <div class="card-body">
                                <div class="datagrid">
                                    <div class="datagrid-item">
                                        <div class="datagrid-title">Inventory Name</div>
                                        <div class="datagrid-content">{{ $item->inventory->name }}</div>
                                    </div>

                                    <div class="datagrid-item">
                                        <div class="datagrid-title">Inventory Code</div>
                                        <div class="datagrid-content">#{{ $item->inventory->code }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if ($item->sold == 'sold')
                        <div class="card mt-3">
                            <div class="card-header">
                                <h3 class="card-title">Invoice Info</h3>
                            </div>
                            <div class="card-body">
                                <div class="datagrid">
                                    <div class="datagrid-item">
                                        <div class="datagrid-title">Serial</div>
                                        <div class="datagrid-content">{{ $item->inventory->serial }}</div>
                                    </div>

                                    <div class="datagrid-item">
                                        <div class="datagrid-title">Inventory Name</div>
                                        <div class="datagrid-content">{{ $item->inventory->name }}</div>
                                    </div>

                                    <div class="datagrid-item">
                                        <div class="datagrid-title">Inventory Code</div>
                                        <div class="datagrid-content">#{{ $item->inventory->code }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Barcode</h3>
                            <div class="card-actions">
                                <button type="button" class="btn btn-sm btn-primary" onclick="printDiv('printMe')">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/printer -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path
                                            d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2">
                                        </path>
                                        <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4"></path>
                                        <path
                                            d="M7 13m0 2a2 2 0 0 1 2 -2h6a2 2 0 0 1 2 2v4a2 2 0 0 1 -2 2h-6a2 2 0 0 1 -2 -2z">
                                        </path>
                                    </svg>
                                    Print
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id='printMe'>
                                <center>
                                    {!! DNS1D::getBarcodeHTML($item->barcode, 'C128') !!}
                                    {{ $item->barcode }}
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;

    }
</script>
