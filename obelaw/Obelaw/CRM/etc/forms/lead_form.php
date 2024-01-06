<?php

use Obelaw\Contacts\Models\Contact;
use Obelaw\Framework\ACL\Models\Admin;
use Obelaw\Schema\Form\Fields;
use Obelaw\Schema\Form\FieldType;

return new class
{
    public function form(Fields $form)
    {
        $form->addField(FieldType::SELECT, [
            'label' => 'Assigned',
            'model' => 'assigned_id',
            'options' => [
                'model' => Admin::class,
                'row' => [
                    'label' => 'name',
                    'value' => 'id',
                ]
            ],
            'rules' => 'required',
            'order' => 10,
        ]);

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
            'order' => 20,
            // 'subfrom' => 'obelaw_helper_contacts_contact_form',
        ]);
    }
};
