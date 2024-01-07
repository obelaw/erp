<?php

namespace Obelaw\Manufacturing\Livewire\Workers;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Obelaw\Manufacturing\Models\Worker;
use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Renderer\FormRender;

#[Access('manufacturing_workers_update')]
class UpdateWorkerComponent extends FormRender
{
    public $formId = 'obelaw_manufacturing_worker_form';

    public $worker = null;

    protected $pretitle = 'Manufacturing Workers';
    protected $title = 'Update This Worker';

    public function mount(Worker $worker)
    {
        $this->worker = $worker;

        $this->setInputs([
            'name' => $worker->name,
            'job_position' => $worker->job_position,
            'employee_code' => $worker->employee_code,
        ]);
    }

    public function submit()
    {
        $validateData = $this->getInputs();

        $this->worker->update($validateData);

        return $this->pushAlert('success', 'The worker has been updated');
    }
}
