<?php

namespace Obelaw\Manufacturing\Livewire\Planning;

use livewire\component;
use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Permissions\Traits\BootPermission;
use Obelaw\UI\Views\Layout\DashboardLayout;
use Obelaw\Manufacturing\Facades\Plans;

#[Access('manufacturing_planning_detail')]
class DetailPlanComponent extends component
{
    use BootPermission;

    public $plan = null;

    public function mount($plan)
    {
        $this->plan = Plans::find(
            id: $plan,
            with: ['orders']
        );
    }

    public function render()
    {
        return view('obelaw-manufacturing::planning.detail', [])->layout(DashboardLayout::class);
    }
}
