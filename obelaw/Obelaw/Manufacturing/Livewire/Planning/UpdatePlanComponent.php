<?php

namespace Obelaw\Manufacturing\Livewire\Planning;

use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Renderer\FormRender;
use Obelaw\Manufacturing\Facades\Plans;
use Obelaw\Manufacturing\Models\Plan;

#[Access('manufacturing_planning_update')]
class UpdatePlanComponent extends FormRender
{
    public $formId = 'obelaw_manufacturing_plan_form';

    public $plan = null;

    protected $pretitle = 'Manufacturing Planning';
    protected $title = 'Update This Plan';

    public function mount(Plan $plan)
    {
        $this->plan = $plan;

        $this->setInputs([
            'name' => $plan->name,
            'start_at' => $plan->start_at,
            'end_at' => $plan->end_at,
        ]);
    }

    public function submit()
    {
        $validateData = $this->getInputs();

        Plans::update($this->plan->id, $validateData);

        return $this->pushAlert('success', 'The plan has been updated');
    }
}
