<?php

namespace O\Addons;

use Obelaw\Accounting\AccountingAddon;
use Obelaw\Audit\AuditAddon;
use Obelaw\Catalog\CatalogAddon;
use Obelaw\Contacts\ContactsAddon;
use Obelaw\Purchasing\PurchasingAddon;
use Obelaw\Sales\SalesAddon;
use Obelaw\Warehouse\WarehouseAddon;

function erp_addons()
{
    return [
        AccountingAddon::make(),
        SalesAddon::make(),
        WarehouseAddon::make(),
        CatalogAddon::make(),
        ContactsAddon::make(),
        AuditAddon::make(),
        AuditAddon::make(),
        PurchasingAddon::make(),
    ];
}
