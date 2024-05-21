<?php

namespace Obelaw\Accounting\Livewire\PriceList;

use Obelaw\Accounting\DTO\PriceList\CreatePriceListDTO;
use Obelaw\Accounting\Facades\PriceLists;
use Obelaw\Accounting\Model\PriceList;
use Obelaw\Permissions\Attributes\Access;
use Obelaw\UI\Renderer\FormRender;

#[Access('accounting_pricelist_update')]
class UpdatePriceListComponent extends FormRender
{
    public $list = null;

    protected $formId = 'obelaw_accounting_pricelist_form';
    protected $pretitle = 'Price list';
    protected $title = 'Update the price list';

    public function mount(PriceList $list)
    {
        $this->list = $list;

        $this->setInputs([
            'name' => $this->list->name,
            'code' => $this->list->code,
            'start_date' => $this->list->start_date,
            'end_date' => $this->list->end_date,
        ]);
    }

    public function submit()
    {
        $validateData = $this->getInputs();

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
