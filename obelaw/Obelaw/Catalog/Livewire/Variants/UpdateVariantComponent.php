<?php

namespace Obelaw\Catalog\Livewire\Variants;

use Obelaw\Catalog\Models\Variant;
use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Renderer\FormRender;

#[Access('catalog_variants_update')]
class UpdateVariantComponent extends FormRender
{
    public $formId = 'obelaw_catalog_variant_form';

    public $variant = null;

    protected $pretitle = 'Variants';
    protected $title = 'Update This Variant';

    public function mount(Variant $variant)
    {
        $this->variant = $variant;
        $this->product_type = $variant->product_type;
        $this->unit_measure = $variant->unit_measure;
        $this->name = $variant->name;
        $this->description = $variant->description;
        $this->cost = $variant->cost;
    }

    public function submit()
    {
        $validateData = $this->validate();

        $this->variant->update($validateData);

        return $this->pushAlert('success', 'The variant has been updated');
    }
}
