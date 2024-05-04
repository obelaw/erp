<?php

use Obelaw\Contacts\Models\Contact;
use Obelaw\Contacts\Models\Pins\Country;
use Obelaw\UI\Schema\Form\Fields;
use Obelaw\UI\Schema\Form\FieldType;

return new class
{
    public function form(Fields $form)
    {
        $form->addField(FieldType::SELECT, [
            'label' => 'Contact',
            'model' => 'contact_id',
            'options' => [
                'model' => Contact::class,
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
            'label' => 'Label',
            'model' => 'label',
            'rules' => 'required',
            'placeholder' => 'Developer',
            'order' => 20,
        ]);

        $form->addField(FieldType::SELECT, [
            'label' => 'Country',
            'model' => 'country_id',
            'options' => [
                'model' => Country::class,
                'row' => [
                    'label' => 'name',
                    'value' => 'id',
                ]
            ],
            'rules' => 'required',
            'order' => 10,
            'hint' => 'You can not select.',
            'selected' => 'getCities'
        ]);


        $form->addField(FieldType::SELECT, [
            'label' => 'City',
            'model' => 'city_id',
            'options' => [],
            'rules' => 'required',
            'order' => 10,
            'hint' => 'You can not select.',
            'selected' => 'getStates',
        ]);

        $form->addField(FieldType::SELECT, [
            'label' => 'State',
            'model' => 'state_id',
            'options' => [],
            'rules' => 'nullable',
            'order' => 10,
            'hint' => 'You can not select.',
            'selected' => 'getZone',
        ]);

        $form->addField(FieldType::SELECT, [
            'label' => 'Area',
            'model' => 'area_id',
            'options' => [],
            'rules' => 'nullable',
            'order' => 10,
            'hint' => 'You can not select.',
        ]);

        $form->addField(FieldType::TEXT, [
            'label' => 'Postcode',
            'model' => 'postcode',
            'rules' => 'nullable',
            'placeholder' => 'Developer',
            'order' => 20,
        ]);

        $form->addField(FieldType::TEXT, [
            'label' => 'Street Line 1',
            'model' => 'street_line_1',
            'rules' => 'required',
            'placeholder' => 'Developer',
            'order' => 20,
        ]);

        $form->addField(FieldType::TEXT, [
            'label' => 'Street Line 2',
            'model' => 'street_line_2',
            'rules' => 'nullable',
            'placeholder' => 'Developer',
            'order' => 20,
        ]);

        $form->addField(FieldType::TEXT, [
            'label' => 'Phone Number',
            'model' => 'phone_number',
            'rules' => 'required',
            'placeholder' => 'Developer',
            'order' => 20,
        ]);

        $form->addField(FieldType::CHECKBOX, [
            'label' => 'Is main',
            'model' => 'is_main',
            'options' => [
                [
                    'label' => 'Is main',
                    'value' => 'main',
                ]
            ],
            'rules' => 'nullable',
            'order' => 40,
            'hint' => 'You can not select.',
        ]);
    }
};
