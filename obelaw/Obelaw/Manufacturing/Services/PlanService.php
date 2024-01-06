<?php

namespace Obelaw\Manufacturing\Services;

use Obelaw\Manufacturing\Events\Plans\CreatedNewPlanEvent;
use Obelaw\Manufacturing\Events\Plans\UpdatedPlanEvent;
use Obelaw\Manufacturing\Exceptions\Plans\CanDeleteItBecauseHaveOrders;
use Obelaw\Manufacturing\Repositories\PlanRepository;

class PlanService
{
    public function __construct(
        public PlanRepository $planRepository
    ) {
    }

    public function create(array $data)
    {
        $plan = $this->planRepository->create($data);

        CreatedNewPlanEvent::dispatch($plan, $data);

        return $plan;
    }

    public function find(int $id, array $with = null)
    {
        return $this->planRepository->getById($id, $with);
    }

    public function update(int $id, array $data)
    {
        $updated = $this->planRepository->updateById($id, $data);

        UpdatedPlanEvent::dispatch($id, $data);

        return $updated;
    }

    public function delete(int $id)
    {
        $this->canDelete($id);

        return $this->planRepository->deleteById($id);
    }

    public function getOrdersById(int $id)
    {
        return $this->planRepository->getOrders($id);
    }

    private function canDelete(int $id)
    {
        if ($this->planRepository->getOrders($id)->isNotEmpty()) {
            throw new CanDeleteItBecauseHaveOrders('Can\'t Delete it because have orders');
        }
    }
}
