<?php

namespace Obelaw\CRM\Livewire\Leads;

use Obelaw\CRM\Exceptions\CustomerHasNewLeadException;
use Obelaw\CRM\Facades\Leads;
use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Renderer\FormRender;

#[Access('crm_leads_create')]
class CreateLeadComponent extends FormRender
{
    public $formId = 'obelaw_crm_lead_form';

    protected $pretitle = 'CRM Leads';
    protected $title = 'Create New Lead';

    public function submit()
    {
        $validateData = $this->getInputs();

        // dd($validateData);

        try {
            Leads::create($validateData['assigned_id'], $validateData['contact_id']);
            $this->pushAlert('success', 'The lead has been created');
        } catch (CustomerHasNewLeadException $e) {
            $this->pushAlert('error', $e->getMessage());
            return redirect()->route('obelaw.crm.leads.show', [$e->getLead()]);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function subSubmitContactId()
    {
        dd(114);
    }
}
