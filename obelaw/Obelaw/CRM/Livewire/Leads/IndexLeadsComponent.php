<?php

namespace Obelaw\CRM\Livewire\Leads;

use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Renderer\GridRender;

#[Access('crm_leads_listing')]
class IndexLeadsComponent extends GridRender
{
    public $gridId = 'obelaw_crm_leads_index';

    protected $pretitle = 'CRM Leads';
    protected $title = 'Leads Listing';

    // #[Access('crm_leads_remove')]
    // public function removeRow(Lead $lead)
    // {
    //     $lead->delete();
    //     return $this->pushAlert('success', 'The order has been deleted');
    // }
}
