<?php

namespace Obelaw\Manufacturing\Livewire\Products;

use Livewire\Component;
use Obelaw\Catalog\Models\Product;
use Obelaw\Catalog\Models\Variant;
use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Views\Layout\DashboardLayout;
use Obelaw\Manufacturing\Facades\Orders;
use Obelaw\Manufacturing\Models\ProductVariant;

#[Access('manufacturing_products_variants')]
class ProductVariantsComponent extends Component
{
    public $product = null;
    public $hasVariants = null;
    public $costVariants = null;

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->preparingVariants();
    }

    public function render()
    {
        $variants = Variant::get();

        return view('obelaw-manufacturing::products.variants', [
            'variants' => $variants
        ])->layout(DashboardLayout::class);
    }

    public function preparingVariants()
    {
        $this->hasVariants = Orders::getVariants($this->product->id);

        // dd($this->hasVariants);

        // $this->hasVariants = $this->product->variants()->with(['variant'])->get();
    }

    public function preparingCostVariants()
    {
        $costTotal = Orders::costTotal($this->product->id);

        $variants = Orders::getVariants($this->product->id)->map(function ($variant) use ($costTotal) {
            return [
                'variant_name' => $variant->variant->name,
                'variant_unit' => $variant->unit,
                'variant_cousts' => $variant->unit * $variant->variant->cost ?? 0,
                'proportion' => floor(($variant->unit * $variant->variant->cost ?? 0) / $costTotal * 100),
            ];
        });

        $this->costVariants = [
            'variants' => $variants,
            'total' => $costTotal,
        ];
    }

    public function addToPrdouct($variantId)
    {
        $pVariant = ProductVariant::where([
            'product_id' => $this->product->id,
            'variant_id' => $variantId,
        ])->first();

        if ($pVariant) {
            $pVariant->increment('unit', 1);
        } else {
            ProductVariant::create([
                'product_id' => $this->product->id,
                'variant_id' => $variantId,
            ]);
        }

        $this->preparingVariants();
    }

    public function increase($variantId)
    {
        ProductVariant::where('id', $variantId)->increment('unit', 1);

        $this->preparingVariants();
    }

    public function decrease($variantId)
    {
        $variant = ProductVariant::where('id', $variantId)->first();

        if ($variant->unit == 1) {
            $variant->delete();
        } else {
            $variant->decrement('unit', 1);
        }

        $this->preparingVariants();
    }
}
