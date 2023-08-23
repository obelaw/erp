<div>
    <div class="row row-0">
        <div class="col">
            <div class="">
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
                <h3 class="card-title mt-3">#{{ $account->code }} {{ $account->name }}</h3>
                <p class="text-secondary">Amount: <x-obelaw-amount :value="$account->amount" /></p>
            </div>
        </div>
    </div>
</div>
