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
                                                    SKU: {{ $product->sku }} | {{ $product->price }} EGP
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
                            <h3 class="card-title">Checkout</h3>
                        </div>
                        <div class="card-body card-body-scrollable card-body-scrollable-shadow" style="height: 28rem">
                            <div class="divide-y">
                                @if ($basketQuotes)
                                    @foreach ($basketQuotes as $quote)
                                        <div>
                                            <div class="row">
                                                {{-- <div class="col-auto">
                                                    <span class="avatar"
                                                        style="background-image: url({{ asset($quote->product->thumbnail_path) }})"></span>
                                                </div> --}}
                                                <div class="col">
                                                    <div class="text-truncate">
                                                        <strong>{{ $quote->item->name }}
                                                            ({{ $quote->quantity }})
                                                        </strong>
                                                        <div class="text-muted">SKU: {{ $quote->item->sku }}</div>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <button href="#" class="btn btn-sm btn-outline-info"
                                                        wire:click="initUpdateQuantity({{ $quote->item }})">
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
                                                        wire:click="increase({{ $quote->item }})">
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
                                                        wire:click="decrease({{ $quote->item }})">
                                                        @if ($quote['quantity'] == 1)
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
                                            @if ($updateQuantityItem?->id == $quote->item->id)
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
                        <div class="card-body">
                            <div class="mb-3">
                                <x-obelaw-select-field label="Vendors" model="vendor_id" :options="$vendors"
                                    hint="Select vendor for this order" :multiple="false" />
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
                        <div class="card-body">
                            <p class="m-0">Sub Total: {{ $subTotal }}</p>
                            <p class="m-0 text-red">
                                - Discount Value: {{ $discountTotal }}
                                @if ($discountTotalLabel)
                                    ({{ $discountTotalLabel }})
                                @endif
                            </p>

                            @if ($discountTotal != 0)
                                <div class="hr-text hr-text-left">
                                    Discount Total = {{ $subTotal - $discountTotal }}
                                </div>
                            @endif

                            <p class="m-0">
                                Tax Total: {{ $taxTotal }} ({{ $taxValue }}%)
                            </p>
                            <p class="m-0 mt-3 h3 text-green">Total: {{ $total }}</p>
                        </div>
                        <div class="card-footer text-end">
                            <div class="d-flex">
                                <button class="btn btn-primary ms-auto" wire:click="createPO">Create Purchase Order
                                    {{ $total }} @currency</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#modal-team">
        Modal with simple form
    </a>
    <div class="modal modal-blur fade" id="modal-team" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add a new team</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3 align-items-end">
                        <div class="col-auto">
                            <a href="#" class="avatar avatar-upload rounded">
                                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 5l0 14" />
                                    <path d="M5 12l14 0" />
                                </svg>
                                <span class="avatar-upload-text">Add</span>
                            </a>
                        </div>
                        <div class="col">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Pick your team color</label>
                        <div class="row g-2">
                            <div class="col-auto">
                                <label class="form-colorinput">
                                    <input name="color" type="radio" value="dark"
                                        class="form-colorinput-input" />
                                    <span class="form-colorinput-color bg-dark"></span>
                                </label>
                            </div>
                            <div class="col-auto">
                                <label class="form-colorinput form-colorinput-light">
                                    <input name="color" type="radio" value="white"
                                        class="form-colorinput-input" checked />
                                    <span class="form-colorinput-color bg-white"></span>
                                </label>
                            </div>
                            <div class="col-auto">
                                <label class="form-colorinput">
                                    <input name="color" type="radio" value="blue"
                                        class="form-colorinput-input" />
                                    <span class="form-colorinput-color bg-blue"></span>
                                </label>
                            </div>
                            <div class="col-auto">
                                <label class="form-colorinput">
                                    <input name="color" type="radio" value="azure"
                                        class="form-colorinput-input" />
                                    <span class="form-colorinput-color bg-azure"></span>
                                </label>
                            </div>
                            <div class="col-auto">
                                <label class="form-colorinput">
                                    <input name="color" type="radio" value="indigo"
                                        class="form-colorinput-input" />
                                    <span class="form-colorinput-color bg-indigo"></span>
                                </label>
                            </div>
                            <div class="col-auto">
                                <label class="form-colorinput">
                                    <input name="color" type="radio" value="purple"
                                        class="form-colorinput-input" />
                                    <span class="form-colorinput-color bg-purple"></span>
                                </label>
                            </div>
                            <div class="col-auto">
                                <label class="form-colorinput">
                                    <input name="color" type="radio" value="pink"
                                        class="form-colorinput-input" />
                                    <span class="form-colorinput-color bg-pink"></span>
                                </label>
                            </div>
                            <div class="col-auto">
                                <label class="form-colorinput">
                                    <input name="color" type="radio" value="red"
                                        class="form-colorinput-input" />
                                    <span class="form-colorinput-color bg-red"></span>
                                </label>
                            </div>
                            <div class="col-auto">
                                <label class="form-colorinput">
                                    <input name="color" type="radio" value="orange"
                                        class="form-colorinput-input" />
                                    <span class="form-colorinput-color bg-orange"></span>
                                </label>
                            </div>
                            <div class="col-auto">
                                <label class="form-colorinput">
                                    <input name="color" type="radio" value="yellow"
                                        class="form-colorinput-input" />
                                    <span class="form-colorinput-color bg-yellow"></span>
                                </label>
                            </div>
                            <div class="col-auto">
                                <label class="form-colorinput">
                                    <input name="color" type="radio" value="lime"
                                        class="form-colorinput-input" />
                                    <span class="form-colorinput-color bg-lime"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div>
                        <label class="form-label">Additional info</label>
                        <textarea class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Add Team</button>
                </div>
            </div>
        </div>
    </div>
</div>
