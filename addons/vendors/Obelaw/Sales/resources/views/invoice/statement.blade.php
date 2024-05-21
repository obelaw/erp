<div>
    @if ($items)
        <table class="table table-transparent table-responsive">
            <thead>
                <tr>
                    <th>Account</th>
                    <th class="text-end" style="width: 25%">debit</th>
                    <th class="text-end" style="width: 25%">credit</th>
                </tr>
            </thead>
            @foreach ($items as $key => $item)
                <tr>
                    <td>
                        {{ $item->account->name }}
                    </td>
                    <td class="text-end">
                        @if ($item->type == 'debit')
                            <x-obelaw-amount value="{{ $item->amount }}" />
                        @endif
                    </td>
                    <td class="text-end">
                        @if ($item->type == 'credit')
                            <x-obelaw-amount value="{{ $item->amount }}" />
                        @endif
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
            </tr>
        </table>
    @else
        <div class="empty">
            <div class="empty-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-invoice">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                    <path
                        d="M19 12v7a1.78 1.78 0 0 1 -3.1 1.4a1.65 1.65 0 0 0 -2.6 0a1.65 1.65 0 0 1 -2.6 0a1.65 1.65 0 0 0 -2.6 0a1.78 1.78 0 0 1 -3.1 -1.4v-14a2 2 0 0 1 2 -2h7l5 5v4.25" />
                </svg>
            </div>
            <p class="empty-title">Not found statement for this invoice</p>
            <p class="empty-subtitle text-secondary">
                You can create and post this invoice
            </p>
        </div>
    @endif
</div>
