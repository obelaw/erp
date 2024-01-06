<?php

namespace Obelaw\Manufacturing\Events\Plans;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Obelaw\Manufacturing\Repositories\PlanRepository;

class UpdatedPlanEvent
{
    use Dispatchable, SerializesModels;

    public $plan = null;

    /**
     * Create a new event instance.
     */
    public function __construct(
        public int $planId,
        public array $data,
    ) {
        $this->plan = (new PlanRepository)->getById($planId);
    }
}
