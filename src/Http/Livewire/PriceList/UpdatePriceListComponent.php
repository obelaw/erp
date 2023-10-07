<?php

namespace Obelaw\Accounting\Http\Livewire\PriceList;

use Obelaw\Accounting\Model\PriceList;
use Obelaw\Framework\Base\FromBase;

class UpdatePriceListComponent extends FromBase
{
    public $formId = 'obelaw_accounting_pricelist_form';

    protected $pretitle = 'Price list';
    protected $title = 'Update the price list';

    public function mount(PriceList $list)
    {
        $this->list = $list;

        $this->name = $this->list->name;
        $this->code = $this->list->code;
        $this->start_date = $this->list->start_date;
        $this->end_date = $this->list->end_date;
    }

    public function submit()
    {
        $validateData = $this->validate();

        $this->list->update($validateData);
    }
}
