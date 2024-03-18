<?php

use Obelaw\Purchasing\Models\Vendor;
use Obelaw\Schema\Form\Fields;
use Obelaw\Schema\Form\FieldType;

return new class
{
    public function form(Fields $form)
    {
        $form->addField(FieldType::SELECT, [
            'label' => 'Vendor',
            'model' => 'vendor_id',
            'options' => [
                'model' => Vendor::class,
                'row' => [
                    'label' => 'name',
                    'value' => 'id',
                ]
            ],
            'rules' => 'required',
            'order' => 80,
            'hint' => 'You can not select.',
        ]);
    }
};
