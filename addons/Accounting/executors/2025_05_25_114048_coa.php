<?php

use Obelaw\Accounting\Services\DatasetsService;
use Pharaonic\Laravel\Executor\Executor;

return new class extends Executor
{
    /**
     * The tag of the executor.
     *
     * @var string|null
     */
    public $tag = "coa";

    /**
     * Execute it.
     * 
     * @return void
     */
    public function handle(): void
    {
        DatasetsService::make()->importCOA(__DIR__ . '/../datasets/coa.json');
    }
};
