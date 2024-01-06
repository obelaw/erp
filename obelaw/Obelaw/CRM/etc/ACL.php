<?php

use Obelaw\Schema\ACL\Permissions;
use Obelaw\Schema\ACL\Section;

return new class
{
    public function permissions(Section $sections)
    {
        $sections->setSection(
            label: 'Leads',
            permission: 'leads',
            permissions: function (Permissions $permissions) {
                $permissions->setPermission(
                    label: 'Leads Listing',
                    permission: 'crm_leads_listing',
                );
                $permissions->setPermission(
                    label: 'Leads Create',
                    permission: 'crm_leads_create',
                );
                $permissions->setPermission(
                    label: 'Leads Remove',
                    permission: 'crm_leads_remove',
                );
            },
        );
    }
};
