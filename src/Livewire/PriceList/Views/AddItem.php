<?php

namespace Obelaw\Accounting\Livewire\PriceList\Views;

use Livewire\Component;

class AddItem extends Component
{
    public function mount($list)
    {
        $this->list = $list;
    }

    public function submit()
    {
        dd(114);
    }

    public function render()
    {
        return <<<'BLADE'
            <!-- <div>list:{{ $this->list }}</div> -->
            <x-obelaw-form-builder id="obelaw_accounting_pricelist_form" />
        BLADE;
    }
}
