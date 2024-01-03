<?php

namespace Obelaw\Accounting\Livewire\Vendors\Views;

use Livewire\Component;
use Obelaw\Accounting\Plugin\Cheques\Model\Cheque;

class VendorChequesView extends Component
{
    public function mount($vendor)
    {
        $this->cheques = Cheque::where('vendor_id', $vendor->id)->get();
    }

    public function render()
    {
        return <<<'BLADE'
            <div class="table-responsive">
                <table class="table table-vcenter card-table table-striped">
                    <thead>
                        <tr>
                            <th>Type</th>
                            <th>Amount</th>
                            <th>Due date</th>
                            <th>Collected</th>
                            <th class="w-1"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($this->cheques as $cheque)
                            <tr>
                                <td>
                                    @if ($cheque->type == 'commitment')
                                        <span class="status status-red">Commitment</span>
                                    @endif

                                    @if ($cheque->type == 'worthy')
                                        <span class="status status-green">Worthy</span>
                                    @endif
                                </td>
                                <td><span class="status">{{ amount($cheque->amount) }}</span></td>
                                <td>{{ $cheque->due_date }}</td>
                                <td>{{ $cheque->collected ?? '-' }}</td>
                                <td>
                                    <a href="{{ route('obelaw.accounting.cheques.show', [$cheque]) }}">Show</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        BLADE;
    }
}
