<?php

use Obelaw\UI\Schema\ACL\Permissions;
use Obelaw\UI\Schema\ACL\Section;

return new class
{
    public function permissions(Section $sections)
    {
        $sections->setSection(
            label: 'contacts',
            permission: 'contacts_contacts',
            permissions: function (Permissions $permissions) {
                $permissions->setPermission(
                    label: 'Contacts Listing',
                    permission: 'contacts_contacts_index',
                );
                $permissions->setPermission(
                    label: 'Contacts Create',
                    permission: 'contacts_contacts_create',
                );
            },
        );
    }
};
