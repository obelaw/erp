<?php

namespace Obelaw\Catalog\Livewire\Categories;

use Obelaw\Catalog\Models\Catagory;
use Obelaw\Permissions\Attributes\Access;
use Obelaw\UI\Renderer\FormRender;

#[Access('catalog_categories_update')]
class UpdateCatagoryComponent extends FormRender
{
    public $formId = 'obelaw_catalog_categories_form';

    public $catagory;

    public function mount(Catagory $catagory)
    {
        $this->catagory = $catagory;

        $this->setInputs([
            'parent_id' => $catagory->parent_id ?? null,
            'name' => $catagory->name,
        ]);
    }

    public function submit()
    {
        $validateData = $this->getInputs();

        $this->catagory->update($validateData);

        $this->pushAlert('success', 'Updated!');
    }
}
