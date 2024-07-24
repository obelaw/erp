<?php

namespace Obelaw\ERP;

class ERP
{
    private string $path = 'erp-o';
    private array $modules = [];

    public static function make(): static
    {
        $static = app(static::class);
        return $static;
    }

    /**
     * Get the value of path
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set the value of path
     *
     * @return  self
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get the value of modules
     */
    public function getModules()
    {
        return $this->modules;
    }

    /**
     * Set the value of modules
     *
     * @return  self
     */
    public function resetModules()
    {
        $this->modules = [];

        return $this;
    }

    /**
     * Set the value of modules
     *
     * @return  self
     */
    public function setModules($modules)
    {
        $this->modules = $modules;

        return $this;
    }

    /**
     * Set the value of module
     *
     * @return  self
     */
    public function appendModule($module)
    {
        array_push($this->modules, $module);

        return $this;
    }
}
