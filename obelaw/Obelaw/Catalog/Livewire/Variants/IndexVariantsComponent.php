<?php

namespace Obelaw\Catalog\Livewire\Variants;

use Obelaw\Catalog\Models\Variant;
use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Renderer\GridRender;
use Obelaw\Framework\Base\Traits\PushAlert;

#[Access('catalog_variants_index')]
class IndexVariantsComponent extends GridRender
{
    use PushAlert;

    public $gridId = 'obelaw_catalog_variants_index';

    protected $pretitle = 'Variants';
    protected $title = 'Variants Listing';

    #[Access('catalog_variants_remove')]
    public function removeRow(Variant $variant)
    {
        $variant->delete();
        return $this->pushAlert('success', 'The variant has been deleted');
    }
}
