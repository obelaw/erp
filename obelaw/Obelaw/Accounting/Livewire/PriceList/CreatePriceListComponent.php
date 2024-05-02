<?php

namespace Obelaw\Accounting\Livewire\PriceList;

use Obelaw\Accounting\DTO\PriceList\CreatePriceListDTO;
use Obelaw\Accounting\Facades\PriceLists;
use Obelaw\Permissions\Attributes\Access;
use Obelaw\UI\Renderer\FormRender;

#[Access('accounting_pricelist_create')]
class CreatePriceListComponent extends FormRender
{
    public $formId = 'obelaw_accounting_pricelist_form';

    protected $pretitle = 'Price list';
    protected $title = 'Create new price list';

    public function submit()
    {
        $validateData = $this->getInputs();

        $list = PriceLists::create(new CreatePriceListDTO(
            $validateData['name'],
            $validateData['code'],
            $validateData['start_date'],
            $validateData['end_date'],
        ));

        $this->pushAlert('success', 'The price list has been created');

        return redirect()->route('obelaw.accounting.price_list.items', [$list]);
    }
}
