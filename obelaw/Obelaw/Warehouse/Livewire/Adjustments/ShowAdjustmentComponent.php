<?php

namespace Obelaw\Warehouse\Livewire\Adjustments;

use Livewire\Component;
use Obelaw\Permissions\Attributes\Access;
use Obelaw\UI\Views\Layout\DashboardLayout;
use Obelaw\Warehouse\Models\Adjustment;

#[Access('warehouse_adjustments_show')]
class ShowAdjustmentComponent extends Component
{
    public $adjustment = null;

    public function mount(Adjustment $adjustment)
    {
        $this->adjustment = $adjustment;
    }

    public function render()
    {
        return view('obelaw-warehouse::adjustments.show')->layout(DashboardLayout::class);
    }
}
