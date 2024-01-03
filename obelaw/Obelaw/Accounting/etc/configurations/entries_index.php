<?php

use Obelaw\Schema\Configurations\Config;
use Obelaw\Schema\Form\Fields;
use Obelaw\Schema\Form\FieldType;

return new class
{
    public $section = 'public';

    public function configurations(Config $config)
    {
        $config->section(function (Fields $form) {
            $form->addField(FieldType::TEXT, [
                'label' => 'Account name',
                'model' => 'name',
                'rules' => 'required',
                'placeholder' => 'IPhone x6',
                'order' => 10,
            ]);
        });
    }
};
