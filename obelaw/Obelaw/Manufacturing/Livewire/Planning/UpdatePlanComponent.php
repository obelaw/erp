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

        $this->name = $plan->name;
        $this->start_at = $plan->start_at;
        $this->end_at = $plan->end_at;
    }

    public function submit()
    {
        // $this->emit('showLoading', true);

        $validateData = $this->validate();

        Plans::update($this->plan->id, $validateData);

        // $this->emit('showLoading', false);

        return $this->pushAlert('success', 'The plan has been updated');
    }
}
