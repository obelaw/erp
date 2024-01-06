<?php

namespace Obelaw\Manufacturing\Repositories;

use Obelaw\Manufacturing\Models\Plan;

class PlanRepository implements CRUDRepository
{
    public function getAll()
    {
        return Plan::all();
    }

    public function getById(int $id, array $with = null)
    {
        $plan = Plan::query();

        if ($with) {
            $plan->with($with);
        }

        return $plan->findOrFail($id);
    }

    public function deleteById(int $id)
    {
        return Plan::destroy($id);
    }

    public function create(array $details)
    {
        return Plan::create($details);
    }

    public function updateById(int $orderId, array $newDetails)
    {
        return Plan::whereId($orderId)->update($newDetails);
    }

    public function getOrders(int $id)
    {
        $plan = $this->getById(
            id: $id,
            with: ['orders'],
        );

        return $plan->orders ?? null;
    }
}
