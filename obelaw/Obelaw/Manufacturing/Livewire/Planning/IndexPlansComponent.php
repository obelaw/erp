<?php

namespace Obelaw\Manufacturing\Livewire\Planning;

use Exception;
use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Renderer\GridRender;
use Obelaw\Framework\Base\Traits\PushAlert;
use Obelaw\Manufacturing\Exceptions\Plans\CanDeleteItBecauseHaveOrders;
use Obelaw\Manufacturing\Facades\Plans;

#[Access('manufacturing_planning_index')]
class IndexPlansComponent extends GridRender
{
    use PushAlert;

    public $gridId = 'obelaw_manufacturing_plans_index';

    protected $pretitle = 'Manufacturing Planning';
    protected $title = 'Planning Listing';

    #[Access('manufacturing_planning_remove')]
    public function removeRow($plan)
    {
        try {
            Plans::delete($plan);
            return $this->pushAlert('success', 'The plan has been deleted');
        } catch (CanDeleteItBecauseHaveOrders $e) {
            return $this->pushAlert('error', $e->getMessage());
        } catch (Exception $e) {
            return $this->pushAlert('error', $e->getMessage());
        }
    }
}
