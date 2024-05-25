<?php

namespace Obelaw\Sales\Livewire\SalesOrder;

use Obelaw\Permissions\Attributes\Access;
use Obelaw\UI\Renderer\GridRender;

#[Access('sales_sales_order_index')]
class IndexCreateSalesComponent extends GridRender
{
    public $gridId = 'obelaw_sales_sales_orders_index';

    protected $pretitle = 'Sales Order';
    protected $title = 'Sales Order Listing';

    public function showItems($row, $record)
    {
        if ($record->items->isNotEmpty()) {
            $items = "<ul>";
            foreach ($record->items as $item) {
                $items .= "<li>$item->name</li>";
            }
            $items .= "</ul>";
        } else {
            $items = "Not Found";
        }

        return <<<BLADE
            <span class="form-help" data-bs-toggle="popover" data-bs-placement="top"
            data-bs-content="$items"
            data-bs-html="true">{$record->items->count()}</span>
        BLADE;
    }

    public function showPaymentMethod($value, $record)
    {
        $reference = $record->payment_method_reference ?? 'Not Found Reference';
        return '<span class="badge" data-bs-toggle="tooltip" data-bs-placement="top" title="' . $reference . '">' . $value->name . '</span>';
    }
}
