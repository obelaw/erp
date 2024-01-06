<?php

namespace Obelaw\Contacts\Providers;

use Livewire\Livewire;
use Obelaw\Contacts\Interfaces\ContactRepositoryInterface;
use Obelaw\Contacts\Livewire\Addresses\CreateAddressesComponent;
use Obelaw\Contacts\Livewire\Addresses\IndexAddressesComponent;
use Obelaw\Contacts\Livewire\Contacts\CreateContactComponent;
use Obelaw\Contacts\Livewire\Contacts\IndexContactsComponent;
use Obelaw\Contacts\Repositories\ContactRepository;
use Obelaw\Framework\Base\ServiceProviderBase;

class ObelawContactsServiceProvider extends ServiceProviderBase
{

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ContactRepositoryInterface::class, ContactRepository::class);

        $this->app->singleton('obelaw.contacts', ContactRepositoryInterface::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Livewire::component('obelaw-contacts-contacts-index', IndexContactsComponent::class);
        Livewire::component('obelaw-contacts-contacts-create', CreateContactComponent::class);

        Livewire::component('obelaw-contacts-addresses-index', IndexAddressesComponent::class);
        Livewire::component('obelaw-contacts-addresses-create', CreateAddressesComponent::class);

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'obelaw-contacts');
    }
}
