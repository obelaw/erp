<div>
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
</div>
