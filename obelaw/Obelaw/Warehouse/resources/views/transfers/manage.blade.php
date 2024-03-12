<div>
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Obelaw Sales
                    </div>
                    <h2 class="page-title">
                        Create new order
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
                    <div class="card" style="height: 33rem">
                        <div class="card-header">
                            <h3 class="card-title">Products list</h3>
                        </div>
                        <div class="card-body card-body-scrollable card-body-scrollable-shadow">
                            <div class="divide-y">
                                @foreach ($products as $product)
                                    <div>
                                        <div class="row">
                                            <div class="col-auto">
                                                <span class="avatar"
                                                    style="background-image: url({{ asset($product->thumbnail_path) }})"></span>
                                            </div>
                                            <div class="col">
                                                <div class="text-truncate">
                                                    <strong>{{ $product->name }}</strong>
                                                </div>
                                                <div class="text-muted">
                                                    SKU: {{ $product->sku }}
                                                </div>
                                            </div>
                                            <div class="col-auto align-self-center">
                                                <button href="#" class="btn btn-outline-primary w-100"
                                                    wire:click="addToBacket({{ $product }})">
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
                                                    Add to basket
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
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Bundle Pool</h3>
                        </div>
                        <div class="card-body card-body-scrollable card-body-scrollable-shadow" style="height: 28rem">
                            <div class="divide-y">
                                @if ($current_items)
                                    @foreach ($current_items as $item)
                                        <div>
                                            <div class="row">
                                                {{-- <div class="col-auto">
                                                    <span class="avatar"
                                                        style="background-image: url({{ asset($quote->product->thumbnail_path) }})"></span>
                                                </div> --}}
                                                <div class="col">
                                                    <div class="text-truncate">
                                                        <strong>{{ $item->product->name }}
                                                            ({{ $item->quantity }})
                                                        </strong>
                                                        <div class="text-muted">
                                                            Available number: {{ $item->quantity }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <button href="#" class="btn btn-sm btn-outline-info"
                                                        wire:click="initUpdateQuantity({{ $item }})">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path
                                                                d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                                            <path
                                                                d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                                            <path d="M16 5l3 3" />
                                                        </svg>
                                                    </button>
                                                    <button href="#" class="btn btn-sm btn-outline-info"
                                                        wire:click="increase({{ $item }})">
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
                                                        wire:click="decrease({{ $item }})">
                                                        @if ($item->quantity == 1)
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
                                            @if ($updateQuantityItem?->id == $item->id)
                                                <div class="row g-2">
                                                    <div class="col">
                                                        <input type="text" class="form-control"
                                                            wire:model="valueQuantityItem" placeholder="Quantity">
                                                    </div>
                                                    <div class="col-auto">
                                                        <button class="btn btn-icon btn-outline-info"
                                                            aria-label="Button" wire:click="updateQuantity">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="icon icon-tabler icon-tabler-check"
                                                                width="24" height="24" viewBox="0 0 24 24"
                                                                stroke-width="1.5" stroke="currentColor"
                                                                fill="none" stroke-linecap="round"
                                                                stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z"
                                                                    fill="none" />
                                                                <path d="M5 12l5 5l10 -10" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    @endforeach
                                @else
                                    <div class="empty">
                                        <div class="empty-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-shopping-cart-plus" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M4 19a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                                <path d="M12.5 17h-6.5v-14h-2"></path>
                                                <path d="M6 5l14 1l-.86 6.017m-2.64 .983h-10.5"></path>
                                                <path d="M16 19h6"></path>
                                                <path d="M19 16v6"></path>
                                            </svg>
                                        </div>
                                        <p class="empty-title">Checkout</p>
                                        <p class="empty-subtitle text-secondary">
                                            You can add products to prepare the sale.
                                        </p>
                                    </div>
                                @endif
                            </div>
                        </div>
                        {{-- <div class="card-body">
                            <div class="input-group input-group-flat">
                                <input type="text" class="form-control @error('promoCode') is-invalid @enderror"
                                    autocomplete="off" wire:model="promoCode">
                                <span class="input-group-text">
                                    @if (!$AppledpromoCode)
                                        <button class="btn btn-sm btn-primary" wire:click="applyCoupon()">Apply
                                            coupon</button>
                                    @endif
                                    @if ($AppledpromoCode)
                                        <button class="btn btn-sm btn-danger" wire:click="restCoupon()">Rest
                                            coupon</button>
                                    @endif
                                </span>
                                @error('promoCode')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div> --}}
                        <div class="card-footer text-end">
                            <div class="d-flex">
                                <button class="btn btn-primary ms-auto" wire:click="createBundles">
                                    Create Bundles
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
