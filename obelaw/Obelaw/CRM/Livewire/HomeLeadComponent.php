<?php

namespace Obelaw\CRM\Livewire;

use Livewire\Component;
use Obelaw\CRM\Facades\Leads;
use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Views\Layout\DashboardLayout;

#[Access('crm_leads_listing')]
class HomeLeadComponent extends Component
{
    public function render()
    {
        return view('obelaw-crm::home', [
            'news' => Leads::getNewList(),
        ])->layout(DashboardLayout::class);
    }

    public function setBecoming($lead)
    {
        dd($lead);
    }
}
