<?php

namespace Obelaw\Accounting\Livewire\PriceList;

use Obelaw\Accounting\DTO\PriceList\CreatePriceListDTO;
use Obelaw\Accounting\Facades\PriceLists;
use Obelaw\Accounting\Model\PriceList;
use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Renderer\FormRender;

#[Access('accounting_pricelist_update')]
class UpdatePriceListComponent extends FormRender
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

        $list = PriceLists::update($this->list->id, new CreatePriceListDTO(
            $validateData['name'],
            $validateData['code'],
            $validateData['start_date'],
            $validateData['end_date'],
        ));

        $this->pushAlert('success', 'The price list has been updated');

        return redirect()->route('obelaw.accounting.price_list.items', [$list]);
    }
}
