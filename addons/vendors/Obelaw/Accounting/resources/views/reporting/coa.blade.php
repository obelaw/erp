<div>
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Reporting
                    </div>
                    <h2 class="page-title">
                        COA
                    </h2>
                    <h2 class="page-title">
                        <span class="text-secondary">{{ $accounts_count }} Accounts</span>
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
                    <div class="col-13">
                        <div class="card">
                            <div class="table-responsive">
                                <table class="table table-vcenter card-table">
                                    <tbody>
                                        @foreach ($accounts as $account)
                                            <tr>
                                                <td>{{ $account->name }} <span class="text-secondary">#{{ $account->code }} - {{ $account->type }}</span></td>
                                                <td width="25%"><x-obelaw-amount :value="$account->amount" /></td>
                                            </tr>
                                            @foreach ($account->accounts as $_account)
                                                <tr class="p-5">
                                                    <td>
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler icon-tabler-corner-down-right"
                                                            width="24" height="24" viewBox="0 0 24 24"
                                                            stroke-width="2" stroke="currentColor" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                            </path>
                                                            <path d="M6 6v6a3 3 0 0 0 3 3h10l-4 -4m0 8l4 -4"></path>
                                                        </svg>
                                                        {{ $_account->name }} <span class="text-secondary">#{{ $_account->code }}</span>
                                                    </td>
                                                    <td width="25%"><x-obelaw-amount :value="$_account->amount" /></td>
                                                </tr>
                                            @endforeach
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
