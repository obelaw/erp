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
                        Create new entry
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
                    <div class="col-6">
                        <form class="card" wire:submit.prevent="addEntry">
                            <div class="card-header">
                                <h3 class="card-title">Create new entry</h3>
                            </div>
                            <div class="card-body">
                                <div class="mb-3 row">
                                    <label class="col-3 col-form-label required">Account</label>
                                    <div class="col">
                                        <select class="form-select" wire:model.defer="account">
                                            <option value=>Select credit account</option>
                                            @foreach ($accounts as $account)
                                                <option value="{{ $account->code }}">#{{ $account->code }} -
                                                    {{ $account->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-3 col-form-label required">Type</label>
                                    <div class="col">
                                        <div class="form-selectgroup">
                                            <label class="form-selectgroup-item">
                                                <input type="radio" wire:model.defer="type" name="type"
                                                    value="debit" class="form-selectgroup-input" checked="">
                                                <span class="form-selectgroup-label">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-arrow-bar-up" width="24"
                                                        height="24" viewBox="0 0 24 24" stroke-width="2"
                                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M12 4l0 10"></path>
                                                        <path d="M12 4l4 4"></path>
                                                        <path d="M12 4l-4 4"></path>
                                                        <path d="M4 20l16 0"></path>
                                                    </svg>
                                                    debit
                                                </span>
                                            </label>
                                            <label class="form-selectgroup-item">
                                                <input type="radio" wire:model.defer="type" name="type"
                                                    value="credit" class="form-selectgroup-input">
                                                <span class="form-selectgroup-label">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-arrow-bar-to-up"
                                                        width="24" height="24" viewBox="0 0 24 24"
                                                        stroke-width="2" stroke="currentColor" fill="none"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M12 10l0 10"></path>
                                                        <path d="M12 10l4 4"></path>
                                                        <path d="M12 10l-4 4"></path>
                                                        <path d="M4 4l16 0"></path>
                                                    </svg>
                                                    credit</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-3 col-form-label required">Amount</label>
                                    <div class="col">
                                        <input class="form-control" wire:model.defer="amount">
                                        <small class="form-hint">We'll never share your email with anyone else.</small>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer text-end">
                                <button type="submit" class="btn btn-primary">Add entry</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Entries</h3>
                                <div class="card-actions">
                                    <input type="date" class="form-control" wire:model.defer="added_on">
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-transparent table-responsive">
                                    <thead>
                                        <tr>
                                            <th>Account</th>
                                            <th class="text-end" style="width: 25%">debit</th>
                                            <th class="text-end" style="width: 25%">credit</th>
                                            <th class="text-end" style="width: 5%"></th>
                                        </tr>
                                    </thead>
                                    @foreach ($items as $key => $item)
                                        <tr>
                                            <td>
                                                {{ $item['account'] }}
                                            </td>
                                            <td class="text-end">
                                                @if ($item['type'] == 'debit')
                                                    <x-obelaw-amount value="{{ $item['amount'] }}" />
                                                @endif
                                            </td>
                                            <td class="text-end">
                                                @if ($item['type'] == 'credit')
                                                    <x-obelaw-amount value="{{ $item['amount'] }}" />
                                                @endif
                                            </td>
                                            <td class="text-end">
                                                <a href="#"
                                                    wire:click="removeEntry({{ $key }})">Remove</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="2" class="font-weight-bold text-end">
                                            <x-obelaw-amount value="{{ $debitSum }}" />
                                        </td>
                                        <td class="font-weight-bold text-end">
                                            <x-obelaw-amount value="{{ $creditSum }}" />
                                        </td>
                                        <th class="text-end" style="width: 5%"></th>
                                    </tr>
                                </table>

                                <div class="mt-3 row" x-data="{ addDescription: false }">
                                    <div class="text-center" x-show="!addDescription">
                                        <a href="#" @click="addDescription = ! addDescription">Add
                                            description</a>
                                    </div>
                                    <div x-show="addDescription">
                                        <textarea class="form-control" wire:model.defer="description" placeholder="Description"></textarea>
                                        <small class="form-hint">We'll never share your email with anyone else.</small>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <button type="submit" class="btn btn-primary" wire:click="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
