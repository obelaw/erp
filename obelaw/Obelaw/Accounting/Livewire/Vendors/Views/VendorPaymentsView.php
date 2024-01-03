<?php

namespace Obelaw\Accounting\Livewire\Vendors\Views;

use Livewire\Component;

class VendorPaymentsView extends Component
{
    public function mount($vendor)
    {
        $this->payments = $vendor->payments;
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
                        @foreach($this->payments as $payment)
                            <tr>
                                <td>
                                    @if ($payment->type == 'send')
                                        <span class="status status-red">Send</span>
                                    @endif

                                    @if ($payment->type == 'receive')
                                        <span class="status status-green">Receive</span>
                                    @endif
                                </td>
                                <td><span class="status">{{ amount($payment->amount) }}</span></td>
                                <td>{{ $payment->due_date }}</td>
                                <td>{{ $payment->collected ?? '-' }}</td>
                                <td>
                                    <a href="#">Show</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        BLADE;
    }
}
