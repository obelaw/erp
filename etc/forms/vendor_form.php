<?php

use Obelaw\Framework\Builder\Form\Fields;

return new class
{
    public function form(Fields $form)
    {
        $form->addField('select', [
            'label' => 'Vendor type',
            'model' => 'type',
            'options' => [
                [
                    'label' => 'Person',
                    'value' => 'person',
                ],
                [
                    'label' => 'Company',
                    'value' => 'company',
                ],
            ],
            'rules' => 'required',
            'order' => 30,
            'hint' => 'You can not select.',
        ]);

        $form->addField('text', [
            'label' => 'Vendor name',
            'model' => 'name',
            'rules' => 'required',
            'placeholder' => 'IPhone x6',
            'order' => 10,
        ]);

        $form->addField('text', [
            'label' => 'Vendor phone',
            'model' => 'phone',
            'rules' => 'nullable',
            'placeholder' => 'IPhone x6',
            'order' => 20,
        ]);

        $form->addField('text', [
            'label' => 'Vendor mobile',
            'model' => 'mobile',
            'rules' => 'required',
            'placeholder' => 'IPhone x6',
            'order' => 20,
        ]);

        $form->addField('text', [
            'label' => 'Vendor email',
            'model' => 'email',
            'rules' => 'required',
            'placeholder' => 'IPhone x6',
            'order' => 20,
        ]);

        $form->addField('text', [
            'label' => 'Vendor website',
            'model' => 'website',
            'rules' => 'nullable',
            'placeholder' => 'IPhone x6',
            'order' => 20,
        ]);
    }
};
