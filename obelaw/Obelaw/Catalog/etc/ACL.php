<?php

use Obelaw\Schema\ACL\Permissions;
use Obelaw\Schema\ACL\Section;

return new class
{
    public function permissions(Section $sections)
    {
        $sections->setSection(
            label: 'Categories',
            permission: 'categories',
            permissions: function (Permissions $permissions) {
                $permissions->setPermission(
                    label: 'categories Listing',
                    permission: 'catalog_categories_index',
                );
                $permissions->setPermission(
                    label: 'categories Update',
                    permission: 'catalog_categories_update',
                );
                $permissions->setPermission(
                    label: 'categories Update',
                    permission: 'catalog_categories_update',
                );
            },
        );

        $sections->setSection(
            label: 'Products',
            permission: 'products',
            permissions: function (Permissions $permissions) {
                $permissions->setPermission(
                    label: 'Products Listing',
                    permission: 'catalog_products_index',
                );
                $permissions->setPermission(
                    label: 'Products Create',
                    permission: 'catalog_products_create',
                );
                $permissions->setPermission(
                    label: 'Products Update',
                    permission: 'catalog_products_update',
                );
            },
        );

        $sections->setSection(
            label: 'Variants',
            permission: 'variants',
            permissions: function (Permissions $permissions) {
                $permissions->setPermission(
                    label: 'Variants Listing',
                    permission: 'catalog_variants_index',
                );
                $permissions->setPermission(
                    label: 'Variants Create',
                    permission: 'catalog_variants_create',
                );
                $permissions->setPermission(
                    label: 'Variants Update',
                    permission: 'catalog_variants_update',
                );
                $permissions->setPermission(
                    label: 'Variants Remove',
                    permission: 'catalog_variants_remove',
                );
            },
        );
    }
};
