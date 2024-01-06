<?php

use Obelaw\Schema\ACL\Permissions;
use Obelaw\Schema\ACL\Section;

return new class
{
    public function permissions(Section $sections)
    {
        $sections->setSection(
            label: 'Adjustments',
            permission: 'adjustments',
            permissions: function (Permissions $permissions) {
                $permissions->setPermission(
                    label: 'Adjustments Index',
                    permission: 'warehouse_adjustments_index',
                );
                $permissions->setPermission(
                    label: 'Adjustments Create',
                    permission: 'warehouse_adjustments_create',
                );
                $permissions->setPermission(
                    label: 'Adjustments Show',
                    permission: 'warehouse_adjustments_show',
                );
            },
        );

        $sections->setSection(
            label: 'Products Categories',
            permission: 'products_categories',
            permissions: function (Permissions $permissions) {
                $permissions->setPermission(
                    label: 'Categories Create',
                    permission: 'warehouse_products_categories_create',
                );
                $permissions->setPermission(
                    label: 'Categories Update',
                    permission: 'warehouse_products_categories_update',
                );
            },
        );

        $sections->setSection(
            label: 'Products',
            permission: 'products',
            permissions: function (Permissions $permissions) {
                $permissions->setPermission(
                    label: 'Products Create',
                    permission: 'warehouse_products_create',
                );
                $permissions->setPermission(
                    label: 'Products Update',
                    permission: 'warehouse_products_update',
                );
            },
        );

        $sections->setSection(
            label: 'Inventories',
            permission: 'inventories',
            permissions: function (Permissions $permissions) {
                $permissions->setPermission(
                    label: 'Inventories Index',
                    permission: 'warehouse_inventories_index',
                );
                $permissions->setPermission(
                    label: 'Inventories Create',
                    permission: 'warehouse_inventories_create',
                );
                $permissions->setPermission(
                    label: 'Inventories Show',
                    permission: 'warehouse_inventories_show',
                );
                $permissions->setPermission(
                    label: 'Inventories Update',
                    permission: 'warehouse_inventories_update',
                );
                $permissions->setPermission(
                    label: 'Inventories Remove',
                    permission: 'warehouse_inventories_remove',
                );
            },
        );

        $sections->setSection(
            label: 'Warehouses',
            permission: 'warehouses',
            permissions: function (Permissions $permissions) {
                $permissions->setPermission(
                    label: 'Warehouses Listing',
                    permission: 'warehouse_warehouses_index',
                );
                $permissions->setPermission(
                    label: 'Warehouses Create',
                    permission: 'warehouse_warehouses_create',
                );
                $permissions->setPermission(
                    label: 'Warehouses Show',
                    permission: 'warehouse_warehouses_show',
                );
                $permissions->setPermission(
                    label: 'Warehouses Update',
                    permission: 'warehouse_warehouses_update',
                );
                $permissions->setPermission(
                    label: 'Warehouses Remove',
                    permission: 'warehouse_warehouses_remove',
                );
            },
        );

        $sections->setSection(
            label: 'Serial Numbers',
            permission: 'serial_numbers',
            permissions: function (Permissions $permissions) {
                $permissions->setPermission(
                    label: 'Serial Numbers Listing',
                    permission: 'warehouse_serial_numbers_index',
                );
                $permissions->setPermission(
                    label: 'Serial Numbers Detail',
                    permission: 'warehouse_serial_numbers_detail',
                );
            },
        );

        $sections->setSection(
            label: 'Transfers',
            permission: 'transfers',
            permissions: function (Permissions $permissions) {
                $permissions->setPermission(
                    label: 'Transfer Listing',
                    permission: 'warehouse_transfer_listing',
                );
                $permissions->setPermission(
                    label: 'Transfer Create',
                    permission: 'warehouse_transfer_create',
                );
                $permissions->setPermission(
                    label: 'Transfer Show',
                    permission: 'warehouse_transfer_show',
                );
            },
        );
    }
};
