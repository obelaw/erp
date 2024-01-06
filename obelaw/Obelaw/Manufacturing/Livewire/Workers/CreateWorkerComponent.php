<?php

namespace Obelaw\Manufacturing\Livewire\Workers;

use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Renderer\FormRender;
use Obelaw\Manufacturing\Models\Worker;

#[Access('manufacturing_workers_create')]
class CreateWorkerComponent extends FormRender
{
    public $formId = 'obelaw_manufacturing_worker_form';

    protected $pretitle = 'Manufacturing Workers';
    protected $title = 'Create New Worker';

    public function submit()
    {
        $validateData = $this->validate();

        Worker::create($validateData);

        return $this->pushAlert('success', 'The worker has been created');
    }
}
