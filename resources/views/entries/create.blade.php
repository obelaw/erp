<div>
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Accounting
                    </div>
                    <h2 class="page-title">
                        Create new account
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="col-12">
                <div class="row row-cards">
                    <div class="col-12">
                        <form class="card" wire:submit.prevent="submit">
                            <div class="card-header">
                                <h3 class="card-title">Horizontal form</h3>
                            </div>
                            <div class="card-body">
                                <div class="mb-3 row">
                                    <label class="col-3 col-form-label">Credit account</label>
                                    <div class="col">
                                        <select class="form-select" wire:model="credit_account">
                                            <option value=>Select credit account</option>
                                            @foreach ($accounts as $account)
                                                <option value="{{ $account->code }}">#{{ $account->code }} -
                                                    {{ $account->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-3 col-form-label">Debit account</label>
                                    <div class="col">
                                        <select class="form-select" wire:model="debit_account">
                                            <option value=>Select debit account</option>
                                            @foreach ($accounts as $account)
                                                <option value="{{ $account->code }}">#{{ $account->code }} -
                                                    {{ $account->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-3 col-form-label required">Amount</label>
                                    <div class="col">
                                        <input class="form-control" wire:model="amount">
                                        <small class="form-hint">We'll never share your email with anyone else.</small>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-3 col-form-label">Description</label>
                                    <div class="col">
                                        <input class="form-control" wire:model="description">
                                        <small class="form-hint">We'll never share your email with anyone else.</small>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-3 col-form-label">Added on</label>
                                    <div class="col">
                                        <input type="date" class="form-control" wire:model="added_on">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
