<?php

namespace Obelaw\CRM\Livewire\Leads\Views;

use Livewire\Component;

class LeadInfo extends Component
{
    public function mount($lead)
    {
        $this->lead = $lead;
    }

    public function render()
    {
        return view('obelaw-crm::leads.views.info', [
            'lead' => $this->lead
        ]);
    }
}
