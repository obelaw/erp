<div>
    <div class="table-responsive">
        <table class="table table-vcenter card-table">
            <thead>
                <tr>
                    <th>Type</th>
                    <th>Amount</th>
                    <th>Description</th>
                    <th>Added on</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($entries as $entry)
                    <tr>
                        <td>
                            <span
                                class="badge bg-{{ $entry->type == 'debit' ? 'red' : 'green' }} text-{{ $entry->type == 'debit' ? 'red' : 'green' }}-fg">
                                {{ $entry->type }}
                            </span>
                        </td>
                        <td>
                            <x-obelaw-amount :value="$entry->amount" :setColor="$entry->type == 'debit' ? 'red' : 'green'" />
                        </td>
                        <td class="text-secondary">
                            {{ $entry->entry->description ?? '-' }}
                        </td>
                        <td class="text-secondary" title="Created at: {{ $entry->entry->created_at }}">
                            {{ $entry->entry->added_on }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @if ($entries->hasPages())
        <div class="mt-5">
            {{ $entries->links() }}
        </div>
    @endif
</div>
