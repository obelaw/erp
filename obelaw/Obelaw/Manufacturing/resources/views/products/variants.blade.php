<div>
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Variants
                    </div>
                    <h2 class="page-title">
                        {{ $product->name }} - {{ $product->serial }}
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
                    <div class="card" style="height: 28rem">
                        <div class="card-header">
                            <h3 class="card-title">Variants List</h3>
                        </div>
                        <div class="card-body card-body-scrollable card-body-scrollable-shadow">
                            <div class="divide-y">
                                @foreach ($variants as $variant)
                                    <div>
                                        <div class="row">
                                            <div class="col-auto">
                                                <span class="avatar"></span>
                                            </div>
                                            <div class="col">
                                                <div class="text-truncate">
                                                    <strong>{{ $variant->name }}</strong>
                                                </div>
                                                <div class="text-muted">{{ $variant->serial }}</div>
                                            </div>
                                            <div class="col-auto align-self-center">
                                                <button href="#" class="btn btn-outline-primary w-100"
                                                    wire:click="addToPrdouct('{{ $variant->id }}')">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-shopping-cart-plus"
                                                        width="24" height="24" viewBox="0 0 24 24"
                                                        stroke-width="2" stroke="currentColor" fill="none"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                                        <path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                                        <path d="M17 17h-11v-14h-2"></path>
                                                        <path d="M6 5l6 .429m7.138 6.573l-.143 1h-13"></path>
                                                        <path d="M15 6h6m-3 -3v6"></path>
                                                    </svg>
                                                    Add to prdouct
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card" style="height: 28rem">
                        <div class="card-header">
                            <h3 class="card-title">Prdouct Variants</h3>
                        </div>
                        <div class="card-body card-body-scrollable card-body-scrollable-shadow">
                            <div class="divide-y">
                                @if (!$hasVariants->isEmpty())
                                    @foreach ($hasVariants as $hasVariant)
                                        <div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="text-truncate">
                                                        <strong>
                                                            {{ $hasVariant->variant->name }} ({{ $hasVariant->unit }})
                                                        </strong>
                                                        <div class="text-muted">{{ $hasVariant->variant->serial }}</div>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <button href="#" class="btn btn-sm btn-outline-info"
                                                        wire:click="increase('{{ $hasVariant->id }}')">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" stroke-width="2"
                                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                            </path>
                                                            <path d="M6 15l6 -6l6 6"></path>
                                                        </svg>
                                                    </button>
                                                    <button href="#" class="btn btn-sm btn-outline-danger"
                                                        wire:click="decrease('{{ $hasVariant->id }}')">
                                                        @if ($hasVariant->unit == 1)
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" stroke-width="2"
                                                                stroke="currentColor" fill="none"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                                </path>
                                                                <path d="M4 7l16 0"></path>
                                                                <path d="M10 11l0 6"></path>
                                                                <path d="M14 11l0 6"></path>
                                                                <path
                                                                    d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12">
                                                                </path>
                                                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3">
                                                                </path>
                                                            </svg>
                                                        @else
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" stroke-width="2"
                                                                stroke="currentColor" fill="none"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                                </path>
                                                                <path d="M6 9l6 6l6 -6"></path>
                                                            </svg>
                                                        @endif
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="empty">
                                        <div class="empty-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-components" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M3 12l3 3l3 -3l-3 -3z"></path>
                                                <path d="M15 12l3 3l3 -3l-3 -3z"></path>
                                                <path d="M9 6l3 3l3 -3l-3 -3z"></path>
                                                <path d="M9 18l3 3l3 -3l-3 -3z"></path>
                                            </svg>
                                        </div>
                                        <p class="empty-title">Prdouct Variants</p>
                                        <p class="empty-subtitle text-secondary">
                                            You can add variants to prdouct.
                                        </p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-cards mt-1">
                <div class="col-12">
                    <div class="card">
                        @if ($costVariants)
                            <div class="card-body">
                                <div class="row g-2 align-items-center">
                                    <div class="col">
                                        <h3 class="page-title">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-calculator" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path
                                                    d="M4 3m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z">
                                                </path>
                                                <path
                                                    d="M8 7m0 1a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1v1a1 1 0 0 1 -1 1h-6a1 1 0 0 1 -1 -1z">
                                                </path>
                                                <path d="M8 14l0 .01"></path>
                                                <path d="M12 14l0 .01"></path>
                                                <path d="M16 14l0 .01"></path>
                                                <path d="M8 17l0 .01"></path>
                                                <path d="M12 17l0 .01"></path>
                                                <path d="M16 17l0 .01"></path>
                                            </svg>
                                            Cost Calculation
                                        </h3>
                                    </div>
                                    <!-- Page title actions -->
                                    <div class="col-auto ms-auto d-print-none">
                                        <div class="btn-list">
                                            <button wire:click="preparingCostVariants()"
                                                class="btn btn-primary btn-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-reload" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path
                                                        d="M19.933 13.041a8 8 0 1 1 -9.925 -8.788c3.899 -1 7.935 1.007 9.425 4.747">
                                                    </path>
                                                    <path d="M20 4v5h-5"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="hr-text">Cost</div>

                                <table class="table table-sm table-borderless">
                                    <thead>
                                        <tr>
                                            <th>Variant</th>
                                            <th class="text-end" width="10%">Unit</th>
                                            <th class="text-end" width="10%">Cost</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($costVariants['variants'] as $variant)
                                            <tr>
                                                <td>
                                                    <div class="progressbg">
                                                        <div class="progress progressbg-progress">
                                                            <div class="progress-bar bg-primary-lt"
                                                                style="width: {{ $variant['proportion'] }}%"
                                                                role="progressbar"
                                                                aria-valuenow="{{ $variant['proportion'] }}"
                                                                aria-valuemin="0" aria-valuemax="100"
                                                                aria-label="{{ $variant['proportion'] }}% Complete">
                                                                <span
                                                                    class="visually-hidden">{{ $variant['proportion'] }}%
                                                                    Complete</span>
                                                            </div>
                                                        </div>
                                                        <div class="progressbg-text">{{ $variant['variant_name'] }}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="w-1 text-end">{{ $variant['variant_unit'] }}</td>
                                                <td class="w-1 text-end">{{ $variant['variant_cousts'] }} @currency
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="2" class="strong text-end">Cost Total</td>
                                            <td class="text-end">{{ $costVariants['total'] }} @currency</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        @endif
                        @if (!$costVariants)
                            <div class="empty">
                                <div class="empty-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-coins"
                                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path
                                            d="M9 14c0 1.657 2.686 3 6 3s6 -1.343 6 -3s-2.686 -3 -6 -3s-6 1.343 -6 3z">
                                        </path>
                                        <path d="M9 14v4c0 1.656 2.686 3 6 3s6 -1.344 6 -3v-4"></path>
                                        <path
                                            d="M3 6c0 1.072 1.144 2.062 3 2.598s4.144 .536 6 0c1.856 -.536 3 -1.526 3 -2.598c0 -1.072 -1.144 -2.062 -3 -2.598s-4.144 -.536 -6 0c-1.856 .536 -3 1.526 -3 2.598z">
                                        </path>
                                        <path d="M3 6v10c0 .888 .772 1.45 2 2"></path>
                                        <path d="M3 11c0 .888 .772 1.45 2 2"></path>
                                    </svg>
                                </div>
                                <p class="empty-title">Cost Calculation</p>
                                <p class="empty-subtitle text-secondary">
                                    Calculate the production cost of one item.
                                </p>
                                <div class="empty-action">
                                    <button wire:click="preparingCostVariants()" class="btn btn-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-calculator" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path
                                                d="M4 3m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z">
                                            </path>
                                            <path
                                                d="M8 7m0 1a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1v1a1 1 0 0 1 -1 1h-6a1 1 0 0 1 -1 -1z">
                                            </path>
                                            <path d="M8 14l0 .01"></path>
                                            <path d="M12 14l0 .01"></path>
                                            <path d="M16 14l0 .01"></path>
                                            <path d="M8 17l0 .01"></path>
                                            <path d="M12 17l0 .01"></path>
                                            <path d="M16 17l0 .01"></path>
                                        </svg>
                                        Calculate
                                    </button>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
