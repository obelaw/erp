<?php

namespace Obelaw\Catalog\Livewire\Variants;

use Obelaw\Catalog\Models\Variant;
use Obelaw\Permissions\Attributes\Access;
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

        $this->setInputs([
            'product_type' => $variant->product_type,
            'unit_measure' => $variant->unit_measure,
            'name' => $variant->name,
            'description' => $variant->description,
            'cost' => $variant->cost,
        ]);
    }

    public function submit()
    {
        $validateData = $this->getInputs();

        $this->variant->update($validateData);

        return $this->pushAlert('success', 'The variant has been updated');
    }
}
