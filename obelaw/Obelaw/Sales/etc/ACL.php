<?php

use Obelaw\Schema\ACL\Permissions;
use Obelaw\Schema\ACL\Section;

return new class
{
    public function permissions(Section $sections)
    {
        $sections->setSection(
            label: 'Coupons',
            permission: 'sales_coupons',
            permissions: function (Permissions $permissions) {
                $permissions->setPermission(
                    label: 'Coupons Listing',
                    permission: 'sales_coupons_index',
                );
                $permissions->setPermission(
                    label: 'Coupons Create',
                    permission: 'sales_coupons_create',
                );
                $permissions->setPermission(
                    label: 'Coupons update',
                    permission: 'sales_coupons_update',
                );
            },
        );

        $sections->setSection(
            label: 'Invoices',
            permission: 'sales_invoices',
            permissions: function (Permissions $permissions) {
                $permissions->setPermission(
                    label: 'Invoices Listing',
                    permission: 'sales_invoices_index',
                );
                $permissions->setPermission(
                    label: 'Invoices Open',
                    permission: 'sales_invoices_open',
                );
            },
        );

        $sections->setSection(
            label: 'Sales Orders',
            permission: 'sales_sales_order',
            permissions: function (Permissions $permissions) {
                $permissions->setPermission(
                    label: 'Order Listing',
                    permission: 'sales_sales_order_index',
                );
                $permissions->setPermission(
                    label: 'Order Create',
                    permission: 'sales_sales_order_create',
                );
                $permissions->setPermission(
                    label: 'Order open',
                    permission: 'sales_sales_order_open',
                );
            },
        );
    }
};
