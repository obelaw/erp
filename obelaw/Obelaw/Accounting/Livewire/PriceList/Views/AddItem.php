<?php

namespace Obelaw\Accounting\Livewire\PriceList\Views;

use Livewire\Component;
use Obelaw\Accounting\Model\PriceListItem;
use Obelaw\Framework\Base\Traits\PushAlert;

class AddItem extends Component
{
    use PushAlert;

    public $list;
    public $inputs = [];

    public function mount($list)
    {
        $this->list = $list;
    }

    public function submit()
    {
        $inputs = $this->inputs;
        $inputs['list_id'] = $this->list->id;

        PriceListItem::create($inputs);

        $this->inputs = [];

        return $this->pushAlert(
            type: 'success',
            massage: 'Item added'
        );
    }

    public function render()
    {
        return <<<'BLADE'
            <div>
                <x-obelaw-form-component id="obelaw_accounting_pricelist_item_form" />
            </div>
        BLADE;
    }
}
