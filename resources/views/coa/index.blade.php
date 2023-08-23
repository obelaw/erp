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
                        Chart Of Accounts
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('obelaw.accounting.coa.create') }}"
                            class="btn btn-primary d-none d-sm-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 5l0 14" />
                                <path d="M5 12l14 0" />
                            </svg>
                            Create new account
                        </a>
                        <a href="{{ route('obelaw.accounting.coa.create') }}"
                            class="btn btn-primary d-sm-none btn-icon">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 5l0 14" />
                                <path d="M5 12l14 0" />
                            </svg>
                        </a>
                    </div>
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
                        <div class="card" x-data="{ subaccount: false }">
                            <div class="list-group list-group-flush list-group-hoverable">

                                @foreach ($accounts as $account)
                                    <div class="list-group-item">
                                        <div class="row align-items-center">
                                            <div class="col-auto"><span class="badge"></span></div>
                                            <div class="col-auto">
                                                <span class="avatar">
                                                    @if ($account->type == 'assets')
                                                        @svg('tabler-asset')
                                                    @elseif ($account->type == 'liabilities')
                                                        @svg('tabler-alarm')
                                                    @elseif ($account->type == 'equity')
                                                        @svg('tabler-percentage')
                                                    @elseif ($account->type == 'cash')
                                                        @svg('tabler-cash')
                                                    @elseif ($account->type == 'bank')
                                                        @svg('tabler-building-bank')
                                                    @else
                                                        @svg('tabler-file-invoice')
                                                    @endif
                                                </span>
                                            </div>
                                            <div class="col text-truncate">
                                                <a href="{{ route('obelaw.accounting.coa.show', [$account]) }}" class="text-reset d-block">#{{ $account->code }} - {{ $account->name }}</a>
                                                <div class="d-block text-muted text-truncate mt-n1">
                                                    {{ $account->type }}
                                                </div>
                                            </div>
                                            <div class="col text-truncate">
                                                <div href="{{ route('obelaw.accounting.coa.show', [$account]) }}" class="text-reset d-block">
                                                    <x-obelaw-amount :value="$account->amount" />
                                                </div>
                                                <div class="d-block text-muted text-truncate mt-n1">
                                                    amount
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <a href="#" class="list-group-item-actions"
                                                    x-show="subaccount != '{{ $account->code }}'"
                                                    @click="subaccount = '{{ $account->code }}'">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted"
                                                        width="24" height="24" viewBox="0 0 24 24"
                                                        stroke-width="2" stroke="currentColor" fill="none"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                                        <path
                                                            d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6">
                                                        </path>
                                                    </svg>
                                                </a>

                                                <a href="#" class="list-group-item-actions"
                                                    x-show="subaccount == '{{ $account->code }}'"
                                                    @click="subaccount = null">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted"
                                                        width="24" height="24" viewBox="0 0 24 24"
                                                        stroke-width="2" stroke="currentColor" fill="none"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M10.585 10.587a2 2 0 0 0 2.829 2.828"></path>
                                                        <path
                                                            d="M16.681 16.673a8.717 8.717 0 0 1 -4.681 1.327c-3.6 0 -6.6 -2 -9 -6c1.272 -2.12 2.712 -3.678 4.32 -4.674m2.86 -1.146a9.055 9.055 0 0 1 1.82 -.18c3.6 0 6.6 2 9 6c-.666 1.11 -1.379 2.067 -2.138 2.87">
                                                        </path>
                                                        <path d="M3 3l18 18"></path>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                        @if (!$account->accounts->isEmpty())
                                            <div class="list-group list-group-flush list-group-hoverable mt-3"
                                                style="border-left: 5px solid #858585; background: #f1f1f1;"
                                                x-show="subaccount == '{{ $account->code }}'">
                                                @foreach ($account->accounts as $_account)
                                                    <div class="list-group-item">
                                                        <div class="row align-items-center">
                                                            <div class="col text-truncate">
                                                                <a href="{{ route('obelaw.accounting.coa.show', [$_account]) }}"
                                                                    class="text-reset d-block">{{ $_account->name }}</a>
                                                                <div class="d-block text-muted text-truncate mt-n1">
                                                                    {{ $_account->code }}
                                                                </div>
                                                            </div>
                                                            <div class="col text-truncate">
                                                                <div href="#" class="text-reset d-block">
                                                                    <x-obelaw-amount :value="$_account->amount" />
                                                                </div>
                                                                <div class="d-block text-muted text-truncate mt-n1">
                                                                    amount
                                                                </div>
                                                            </div>
                                                            <div class="col-auto">
                                                                <a href="#" class="list-group-item-actions">
                                                                    <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        class="icon text-muted" width="24"
                                                                        height="24" viewBox="0 0 24 24"
                                                                        stroke-width="2" stroke="currentColor"
                                                                        fill="none" stroke-linecap="round"
                                                                        stroke-linejoin="round">
                                                                        <path stroke="none" d="M0 0h24v24H0z"
                                                                            fill="none" />
                                                                        <path
                                                                            d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                                                    </svg>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
