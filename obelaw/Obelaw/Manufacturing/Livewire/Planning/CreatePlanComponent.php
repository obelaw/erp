<?php

namespace Obelaw\Manufacturing\Livewire\Planning;

use Obelaw\UI\Renderer\FormRender;
use Obelaw\Manufacturing\Facades\Plans;

#[Access('manufacturing_planning_create')]
class CreatePlanComponent extends FormRender
{
    public $formId = 'obelaw_manufacturing_plan_form';

    protected $pretitle = 'Manufacturing Planning';
    protected $title = 'Create New plan';

    public function submit()
    {
        $validateData = $this->validate();

        $plan = Plans::create($validateData);

        $this->pushAlert('success', 'The plan has been created');

        return redirect()->route('obelaw.manufacturing.planning.detail', [$plan]);
    }
}
