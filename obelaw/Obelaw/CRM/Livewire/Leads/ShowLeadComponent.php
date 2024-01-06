<?php

namespace Obelaw\CRM\Livewire\Leads;

use Obelaw\CRM\Models\Lead;
use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Renderer\ViewRender;

#[Access('crm_leads_listing')]
class ShowLeadComponent extends ViewRender
{
    public $gridId = 'obelaw_crm_leads_index';
    public $viewId = 'obelaw_crm_lead_view';

    protected $pretitle = 'CRM Leads';
    protected $title = 'Leads Listing';

    public function mount(Lead $lead)
    {
        $this->parameters(['lead' => $lead]);
    }
}
