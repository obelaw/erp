<?php

namespace Obelaw\ERP\Managers;

class TableManager
{
    public function __construct(private array $actions)
    {
    }

    public function exclude(string|array $keys)
    {
        if (is_array($keys))
            foreach ($keys as $key) {
                unset($this->actions[$key]);
            }

        if (is_string($keys))
            unset($this->actions[$keys]);

        return $this;
    }

    public function make()
    {
        return array_values($this->actions);
    }
}
