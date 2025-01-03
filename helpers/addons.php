<?php

namespace O\Addons;

use Obelaw\ERP\Addons\Accounting\AccountingAddon;
use Obelaw\ERP\Addons\Audit\AuditAddon;
use Obelaw\ERP\Addons\Catalog\CatalogAddon;
use Obelaw\ERP\Addons\Contacts\ContactsAddon;
use Obelaw\ERP\Addons\Purchasing\PurchasingAddon;
use Obelaw\ERP\Addons\Sales\SalesAddon;
use Obelaw\ERP\Addons\Warehouse\WarehouseAddon;

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
