<?php
namespace Obelaw\Warehouse;

class Filter
{
    public function string($value)
    {
        return 'd11_' . $value;
    }
}
