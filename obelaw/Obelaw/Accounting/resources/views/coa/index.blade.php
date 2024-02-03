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
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler icon-tabler-asset" width="24"
                                                            height="24" viewBox="0 0 24 24" stroke-width="2"
                                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M9 15m-6 0a6 6 0 1 0 12 0a6 6 0 1 0 -12 0" />
                                                            <path d="M9 15m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                            <path d="M19 5m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                            <path d="M14.218 17.975l6.619 -12.174" />
                                                            <path d="M6.079 9.756l12.217 -6.631" />
                                                            <path d="M9 15m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                        </svg>
                                                    @elseif ($account->type == 'liabilities')
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler icon-tabler-alarm" width="24"
                                                            height="24" viewBox="0 0 24 24" stroke-width="2"
                                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M12 13m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                                            <path d="M12 10l0 3l2 0" />
                                                            <path d="M7 4l-2.75 2" />
                                                            <path d="M17 4l2.75 2" />
                                                        </svg>
                                                    @elseif ($account->type == 'equity')
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler icon-tabler-percentage"
                                                            width="24" height="24" viewBox="0 0 24 24"
                                                            stroke-width="2" stroke="currentColor" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M17 17m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                                            <path d="M7 7m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                                            <path d="M6 18l12 -12" />
                                                        </svg>
                                                    @elseif ($account->type == 'cash')
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler icon-tabler-cash" width="24"
                                                            height="24" viewBox="0 0 24 24" stroke-width="2"
                                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path
                                                                d="M7 9m0 2a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2z" />
                                                            <path d="M14 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                            <path
                                                                d="M17 9v-2a2 2 0 0 0 -2 -2h-10a2 2 0 0 0 -2 2v6a2 2 0 0 0 2 2h2" />
                                                        </svg>
                                                    @elseif ($account->type == 'bank')
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler icon-tabler-building-bank"
                                                            width="24" height="24" viewBox="0 0 24 24"
                                                            stroke-width="2" stroke="currentColor" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M3 21l18 0" />
                                                            <path d="M3 10l18 0" />
                                                            <path d="M5 6l7 -3l7 3" />
                                                            <path d="M4 10l0 11" />
                                                            <path d="M20 10l0 11" />
                                                            <path d="M8 14l0 3" />
                                                            <path d="M12 14l0 3" />
                                                            <path d="M16 14l0 3" />
                                                        </svg>
                                                    @else
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler icon-tabler-file-invoice"
                                                            width="24" height="24" viewBox="0 0 24 24"
                                                            stroke-width="2" stroke="currentColor" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                                            <path
                                                                d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                                                            <path d="M9 7l1 0" />
                                                            <path d="M9 13l6 0" />
                                                            <path d="M13 17l2 0" />
                                                        </svg>
                                                    @endif
                                                </span>
                                            </div>
                                            <div class="col text-truncate">
                                                <a href="{{ route('obelaw.accounting.coa.show', [$account]) }}"
                                                    class="text-reset d-block">#{{ $account->code }} -
                                                    {{ $account->name }}</a>
                                                <div class="d-block text-muted text-truncate mt-n1">
                                                    {{ $account->type }}
                                                </div>
                                            </div>
                                            <div class="col text-truncate">
                                                <div href="{{ route('obelaw.accounting.coa.show', [$account]) }}"
                                                    class="text-reset d-block">
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
