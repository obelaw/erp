<?php

namespace Obelaw\Warehouse\Utils;

class TransferTypeManagement
{
    public $types = [];

    public function addType($model, $label)
    {
        $type[$model] = $label;

        $this->types = array_merge($this->types, $type);
    }

    public function getType($model)
    {
        return $this->types[$model];
    }

    public function getTypes()
    {
        return $this->types;
    }
}
