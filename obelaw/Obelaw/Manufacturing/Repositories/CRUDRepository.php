<?php

namespace Obelaw\Manufacturing\Repositories;

interface CRUDRepository
{
    public function getAll();

    public function getById(int $id);

    public function deleteById(int $id);

    public function create(array $details);

    public function updateById(int $orderId, array $newDetails);
}
