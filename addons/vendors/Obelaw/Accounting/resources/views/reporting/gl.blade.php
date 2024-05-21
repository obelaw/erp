<div>
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Sales Analysis
                    </h2>
                    <div class="text-secondary mt-1">
                        This report from x</b>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="row g-4">
                <div class="col-3">
                    <form autocomplete="off" novalidate wire:submit="submitFilter">
                        <div class="subheader mb-1">Account</div>
                        <div>
                            <select wire:model="account_id" class="form-select">
                                <option value=>Select Account...</option>
                                @foreach ($accounts as $account)
                                    <option value="{{ $account->id }}">{{ $account->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="subheader mt-2 mb-1">Account</div>
                        <div>
                            <input class="form-control mb-1" type="date" wire:model="date_from" />
                            <input class="form-control" type="date" wire:model="date_to" />
                        </div>

                        <div class="mt-5">
                            <button type="submit" class="btn btn-primary w-100">
                                Confirm Filter
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-9">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table card-table">
                                <thead>
                                    <tr>
                                        <th>Debit</th>
                                        <th>Credit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="table-responsive">
                                                <table class="table table-vcenter card-table">
                                                    <thead>
                                                        <tr>
                                                            <th>Account</th>
                                                            <th>Amount</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($entryDebits as $entry)
                                                            <tr>
                                                                <td colspan="2">
                                                                    Entry <a
                                                                        href="{{ route('obelaw.accounting.entries.show', [$entry->entry_id]) }}">
                                                                        #{{ $entry->entry_id }}</a>
                                                                </td>
                                                            </tr>
                                                            @foreach ($entry->credits as $credit)
                                                                <tr>
                                                                    <td>{{ $credit->account->name }}</td>
                                                                    <td>{{ $credit->amount }} @currency</td>
                                                                </tr>
                                                            @endforeach
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="table-responsive">
                                                <table class="table table-vcenter card-table">
                                                    <thead>
                                                        <tr>
                                                            <th>Account</th>
                                                            <th>amount</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($entryCredits as $entry)
                                                            <tr>
                                                                <td colspan="2">
                                                                    Entry <a
                                                                        href="{{ route('obelaw.accounting.entries.show', [$entry->entry_id]) }}">
                                                                        #{{ $entry->entry_id }}</a>
                                                                </td>
                                                            </tr>
                                                            @foreach ($entry->debits as $debit)
                                                                <tr>
                                                                    <td>{{ $debit->account->name }}</td>
                                                                    <td>{{ $debit->amount }} @currency</td>
                                                                </tr>
                                                            @endforeach
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
