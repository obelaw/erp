<?php

namespace Obelaw\ERP;

use Obelaw\Accounting\AccountingAddon;
use Obelaw\Audit\AuditAddon;
use Obelaw\Catalog\CatalogAddon;
use Obelaw\Contacts\ContactsAddon;
use Obelaw\Purchasing\PurchasingAddon;
use Obelaw\Sales\SalesAddon;
use Obelaw\Shipping\ShippingAddon;
use Obelaw\Warehouse\WarehouseAddon;

class ERPManagement
{
    public function loadAddons()
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
            ShippingAddon::make(),
        ];
    }
}
