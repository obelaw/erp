<?php

use Obelaw\Accounting\Model\PaymentMethod;
use Obelaw\Accounting\Model\Vendor;
use Obelaw\Schema\Form\Fields;
use Obelaw\Schema\Form\FieldType;

return new class
{
    public function form(Fields $form)
    {
        $form->addField(FieldType::SELECT, [
            'label' => 'Payment type',
            'model' => 'type',
            'options' => [
                [
                    'label' => 'Send',
                    'value' => 'send',
                ],
                [
                    'label' => 'Receive',
                    'value' => 'receive',
                ],
            ],
            'rules' => 'required',
            'order' => 30,
            'hint' => 'You can not select.',
        ]);

        $form->addField(FieldType::SELECT, [
            'label' => 'Vendor name',
            'model' => 'vendor_id',
            'options' => [
                'model' => Vendor::class,
                'row' => [
                    'label' => 'name',
                    'value' => 'id',
                ]
            ],
            'rules' => 'required',
            'order' => 10,
            'hint' => 'You can not select.',
        ]);

        $form->addField(FieldType::SELECT, [
            'label' => 'Payment Method',
            'model' => 'payment_method_id',
            'options' => [
                'model' => PaymentMethod::class,
                'row' => [
                    'label' => 'name',
                    'value' => 'id',
                ]
            ],
            'rules' => 'required',
            'order' => 10,
            'hint' => 'You can not select.',
        ]);

        $form->addField(FieldType::TEXT, [
            'label' => 'Amount',
            'model' => 'amount',
            'rules' => 'required',
            'placeholder' => 'IPhone x6',
            'order' => 20,
        ]);

        $form->addField(FieldType::TEXTAREA, [
            'label' => 'Notes',
            'model' => 'notes',
            'rules' => 'nullable',
            'placeholder' => 'IPhone x6',
            'order' => 20,
        ]);

        $form->addField(FieldType::DATE, [
            'label' => 'Due date',
            'model' => 'due_date',
            'rules' => 'required',
            'placeholder' => 'IPhone x6',
            'order' => 20,
        ]);
    }
};
