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
                                    <label class="col-3 col-form-label">Parent account</label>
                                    <div class="col">
                                        <select class="form-select" wire:model="parent_account">
                                            <option value=>Select account</option>
                                            @foreach ($accounts as $account)
                                                <option value="{{ $account->id }}">#{{ $account->code }} - {{ $account->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-3 col-form-label required">Account name</label>
                                    <div class="col">
                                        <input class="form-control" wire:model="name">
                                        <small class="form-hint">We'll never share your email with anyone else.</small>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-3 col-form-label required">Account code</label>
                                    <div class="col">
                                        <input class="form-control" wire:model="code">
                                        <small class="form-hint">We'll never share your email with anyone else.</small>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-3 col-form-label">Account type</label>
                                    <div class="col">
                                        <select class="form-select" wire:model="type">
                                            <option value=>Select account</option>
                                            <option value="1">Safe</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-3 col-form-label pt-0">Negative count</label>
                                    <div class="col">
                                        <label class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                wire:model="can_negative_count">
                                            <span class="form-check-label">Can negative count</span>
                                        </label>
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
