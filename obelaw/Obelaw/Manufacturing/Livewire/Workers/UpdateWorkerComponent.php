<?php

namespace Obelaw\Manufacturing\Livewire\Workers;

use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Renderer\FormRender;
use Obelaw\Manufacturing\Models\Worker;

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
        $this->name = $worker->name;
        $this->job_position = $worker->job_position;
        $this->employee_code = $worker->employee_code;
    }

    public function submit()
    {
        $validateData = $this->validate();

        // dd($this->worker, $validateData, $this->worker->update($validateData));

        $this->worker->update($validateData);

        return $this->pushAlert('success', 'The worker has been updated');
    }
}
