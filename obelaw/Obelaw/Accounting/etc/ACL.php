<?php

use Obelaw\Schema\ACL\Permissions;
use Obelaw\Schema\ACL\Section;

return new class
{
    public function permissions(Section $sections)
    {
        $sections->setSection(
            label: 'Chart Of Accounts',
            permission: 'accounting_coa',
            permissions: function (Permissions $permissions) {
                $permissions->setPermission(
                    label: 'Account List',
                    permission: 'accounting_coa_index',
                );
                $permissions->setPermission(
                    label: 'Account Create',
                    permission: 'accounting_coa_create',
                );
                $permissions->setPermission(
                    label: 'Account Show',
                    permission: 'accounting_coa_show',
                );
            },
        );

        $sections->setSection(
            label: 'Payments',
            permission: 'accounting_payments',
            permissions: function (Permissions $permissions) {
                $permissions->setPermission(
                    label: 'Payments Lisintg',
                    permission: 'accounting_payments_index',
                );
                $permissions->setPermission(
                    label: 'Payments Create',
                    permission: 'accounting_payments_create',
                );
                $permissions->setPermission(
                    label: 'Payments Show',
                    permission: 'accounting_payments_update',
                );
            },
        );

        $sections->setSection(
            label: 'Entries',
            permission: 'accounting_entries',
            permissions: function (Permissions $permissions) {
                $permissions->setPermission(
                    label: 'Entries Listing',
                    permission: 'accounting_entries_index',
                );
                $permissions->setPermission(
                    label: 'Entries Create',
                    permission: 'accounting_entries_create',
                );
                $permissions->setPermission(
                    label: 'Entries Show',
                    permission: 'accounting_entries_show',
                );
            },
        );

        $sections->setSection(
            label: 'Pricelist',
            permission: 'pricelist',
            permissions: function (Permissions $permissions) {
                $permissions->setPermission(
                    label: 'Pricelist Listing',
                    permission: 'accounting_pricelist_index',
                );
                $permissions->setPermission(
                    label: 'Pricelist Show',
                    permission: 'accounting_pricelist_create',
                );
                $permissions->setPermission(
                    label: 'Pricelist Items',
                    permission: 'accounting_pricelist_items',
                );
                $permissions->setPermission(
                    label: 'Pricelist Update',
                    permission: 'accounting_pricelist_update',
                );
            },
        );

        $sections->setSection(
            label: 'Vendors',
            permission: 'accounting_vendors',
            permissions: function (Permissions $permissions) {
                $permissions->setPermission(
                    label: 'Vendors Listing',
                    permission: 'accounting_vendors_index',
                );
                $permissions->setPermission(
                    label: 'Vendors Create',
                    permission: 'accounting_vendors_create',
                );
                $permissions->setPermission(
                    label: 'Vendors Show',
                    permission: 'accounting_vendors_show',
                );
                $permissions->setPermission(
                    label: 'Vendors Update',
                    permission: 'accounting_vendors_update',
                );
            },
        );

        $sections->setSection(
            label: 'Reporting',
            permission: 'accounting_reporting',
            permissions: function (Permissions $permissions) {
                $permissions->setPermission(
                    label: 'Coa Report',
                    permission: 'accounting_reporting_coa',
                );
            },
        );

        $sections->setSection(
            label: 'Configurations',
            permission: 'accounting_configurations',
            permissions: function (Permissions $permissions) {
                $permissions->setPermission(
                    label: 'Payment Methods List',
                    permission: 'accounting_configurations_payment_methods',
                );
                $permissions->setPermission(
                    label: 'Payment Method Create',
                    permission: 'accounting_configurations_payment_methods_create',
                );
                $permissions->setPermission(
                    label: 'Payment Method Update',
                    permission: 'accounting_configurations_payment_methods_update',
                );
            },
        );
    }
};
