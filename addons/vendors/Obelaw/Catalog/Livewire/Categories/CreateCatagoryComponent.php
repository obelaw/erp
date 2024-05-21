<?php

namespace Obelaw\Catalog\Livewire\Categories;

use Obelaw\Catalog\Models\Catagory;
use Obelaw\Permissions\Attributes\Access;
use Obelaw\UI\Renderer\FormRender;

#[Access('catalog_categories_create')]
class CreateCatagoryComponent extends FormRender
{
    public $formId = 'obelaw_catalog_categories_form';

    public function submit()
    {
        $validateData = $this->getInputs();

        Catagory::create($validateData);

        return $this->pushAlert('success', 'The catagory has been created');
    }
}
