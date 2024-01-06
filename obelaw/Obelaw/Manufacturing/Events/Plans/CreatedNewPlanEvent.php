<?php

namespace Obelaw\Manufacturing\Events\Plans;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Obelaw\Manufacturing\Models\Plan;

class CreatedNewPlanEvent
{
    use Dispatchable, SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct(
        public Plan $plan,
        public array $data,
    ) {
    }
}
