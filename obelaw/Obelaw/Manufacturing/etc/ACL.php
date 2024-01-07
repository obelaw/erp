<?php

use Obelaw\Schema\ACL\Permissions;
use Obelaw\Schema\ACL\Section;

return new class
{
    public function permissions(Section $sections)
    {
        $sections->setSection(
            label: 'Orders',
            permission: 'manufacturing_orders',
            permissions: function (Permissions $permissions) {
                $permissions->setPermission(
                    label: 'Orders Listing',
                    permission: 'manufacturing_orders_index',
                );
                $permissions->setPermission(
                    label: 'Orders Create',
                    permission: 'manufacturing_orders_create',
                );
                $permissions->setPermission(
                    label: 'Orders Detail',
                    permission: 'manufacturing_orders_detail',
                );
            },
        );

        $sections->setSection(
            label: 'Planning',
            permission: 'manufacturing_planning',
            permissions: function (Permissions $permissions) {
                $permissions->setPermission(
                    label: 'Planning Listing',
                    permission: 'manufacturing_planning_index',
                );
                $permissions->setPermission(
                    label: 'Planning Create',
                    permission: 'manufacturing_planning_create',
                );
                $permissions->setPermission(
                    label: 'Planning Detail',
                    permission: 'manufacturing_planning_detail',
                );
                $permissions->setPermission(
                    label: 'Planning Update',
                    permission: 'manufacturing_planning_update',
                );
                $permissions->setPermission(
                    label: 'Planning Remove',
                    permission: 'manufacturing_planning_remove',
                );
            },
        );

        $sections->setSection(
            label: 'Products',
            permission: 'manufacturing_products',
            permissions: function (Permissions $permissions) {
                $permissions->setPermission(
                    label: 'Products Listing',
                    permission: 'manufacturing_products_index',
                );
                $permissions->setPermission(
                    label: 'Products Create',
                    permission: 'manufacturing_products_create',
                );
                $permissions->setPermission(
                    label: 'Products Variants',
                    permission: 'manufacturing_products_variants',
                );
                $permissions->setPermission(
                    label: 'Products Variants',
                    permission: 'manufacturing_products_update',
                );
            },
        );

        $sections->setSection(
            label: 'Workers',
            permission: 'manufacturing_workers',
            permissions: function (Permissions $permissions) {
                $permissions->setPermission(
                    label: 'Workers Listing',
                    permission: 'manufacturing_workers_index',
                );
                $permissions->setPermission(
                    label: 'Workers Create',
                    permission: 'manufacturing_workers_create',
                );
                $permissions->setPermission(
                    label: 'Workers Update',
                    permission: 'manufacturing_workers_update',
                );
            },
        );
    }
};
