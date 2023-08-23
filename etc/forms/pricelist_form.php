<?php

use Obelaw\Framework\Builder\Form\Fields;

return new class
{
    public function form(Fields $form)
    {
        $form->addField('text', [
            'label' => 'Name list',
            'model' => 'name',
            'rules' => 'required',
            'placeholder' => 'IPhone x6',
            'order' => 10,
        ]);

        $form->addField('text', [
            'label' => 'Code list',
            'model' => 'code',
            'rules' => 'required',
            'placeholder' => 'IPhone x6',
            'order' => 20,
        ]);

        $form->addField('date', [
            'label' => 'Start date',
            'model' => 'start_date',
            'rules' => 'nullable',
            'placeholder' => 'IPhone x6',
            'order' => 20,
        ]);

        $form->addField('date', [
            'label' => 'End date',
            'model' => 'end_date',
            'rules' => 'nullable',
            'placeholder' => 'IPhone x6',
            'order' => 20,
        ]);
    }
};
