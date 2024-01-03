<?php

namespace Obelaw\Catalog\Livewire\Categories;

use Obelaw\Catalog\Models\Catagory;
use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Renderer\FormRender;

#[Access('catalog_categories_create')]
class CatagoryCreateComponent extends FormRender
{
    public $formId = 'obelaw_catalog_categories_form';

    public function submit()
    {
        $validateData = $this->validate();

        Catagory::create($validateData);
    }
}
