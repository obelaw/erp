<?php

use Obelaw\Schema\Form\Fields;
use Obelaw\Schema\Form\FieldType;

return new class
{
    public function form(Fields $form)
    {
        $form->addField(FieldType::TEXTAREA, [
            'label' => 'Serials',
            'model' => 'serials',
            'rules' => 'nullable',
            'order' => 10,
        ]);
    }
};
