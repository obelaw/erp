<?php

use Obelaw\UI\Schema\ACL\Permissions;
use Obelaw\UI\Schema\ACL\Section;

return new class
{
    public function permissions(Section $sections)
    {
        $sections->setSection(
            label: 'Purchase Orders',
            permission: 'purchasing_po',
            permissions: function (Permissions $permissions) {
                $permissions->setPermission(
                    label: 'Purchase Orders Listing',
                    permission: 'purchasing_po_index',
                );
                $permissions->setPermission(
                    label: 'Purchase Order Create',
                    permission: 'purchasing_po_create',
                );
                $permissions->setPermission(
                    label: 'Purchase Order Sohw',
                    permission: 'purchasing_po_show',
                );
                $permissions->setPermission(
                    label: 'Purchase Order Receive',
                    permission: 'purchasing_po_receive',
                );
            },
        );

        $sections->setSection(
            label: 'Bills',
            permission: 'purchasing_bills',
            permissions: function (Permissions $permissions) {
                $permissions->setPermission(
                    label: 'Bills Listing',
                    permission: 'purchasing_bills_index',
                );
                $permissions->setPermission(
                    label: 'Vendor Sohw',
                    permission: 'purchasing_bills_show',
                );
            },
        );

        $sections->setSection(
            label: 'Purchasing',
            permission: 'purchasing_vendors',
            permissions: function (Permissions $permissions) {
                $permissions->setPermission(
                    label: 'Vendors Listing',
                    permission: 'purchasing_vendors_index',
                );
                $permissions->setPermission(
                    label: 'Vendor Create',
                    permission: 'purchasing_vendors_create',
                );
                $permissions->setPermission(
                    label: 'Vendor Sohw',
                    permission: 'purchasing_vendors_show',
                );
                $permissions->setPermission(
                    label: 'Vendor Update',
                    permission: 'purchasing_vendors_update',
                );
            },
        );
    }
};
