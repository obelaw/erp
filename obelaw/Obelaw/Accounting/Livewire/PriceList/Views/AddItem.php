<?php

namespace Obelaw\Accounting\Livewire\PriceList\Views;

use Livewire\Component;
use Obelaw\Accounting\Model\PriceListItem;
use Obelaw\Framework\Base\Traits\PushAlert;

class AddItem extends Component
{
    use PushAlert;

    public $list;
    public $sku;
    public $price;
    public $inputs;

    public function mount($list)
    {
        $this->list = $list;
    }

    public function submit()
    {
        PriceListItem::create([
            'list_id' => $this->list->id,
            'sku' => $this->sku,
            'price' => $this->price,
        ]);

        $this->reset(['sku', 'price']);

        return $this->pushAlert(
            type: 'success',
            massage: 'Item added'
        );
    }

    public function render()
    {
        return <<<'BLADE'
            <x-obelaw-form-component id="obelaw_accounting_pricelist_item_form" />
        BLADE;
    }
}
