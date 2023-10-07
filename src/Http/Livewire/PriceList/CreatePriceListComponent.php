<?php

namespace Obelaw\Accounting\Http\Livewire\PriceList;

use Obelaw\Accounting\Model\PriceList;
use Obelaw\Framework\Base\FromBase;

class CreatePriceListComponent extends FromBase
{
    public $formId = 'obelaw_accounting_pricelist_form';

    protected $pretitle = 'Price list';
    protected $title = 'Create new price list';

    public function submit()
    {
        $validateData = $this->validate();

        PriceList::create($validateData);
    }
}
