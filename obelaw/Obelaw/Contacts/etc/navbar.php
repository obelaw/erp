<?php

use Obelaw\Schema\Navbar\Links;

return new class
{
    public function navbar(Links $links)
    {
        $links->link(
            icon: 'home-2',
            label: 'Home',
            href: 'obelaw.contacts.home',
        );

        $links->link(
            icon: 'address-book',
            label: 'Contacts',
            href: 'obelaw.contacts.contacts.list',
        );

        $links->link(
            icon: 'address-book',
            label: 'Addresses',
            href: 'obelaw.contacts.addresses.list',
        );
    }
};
