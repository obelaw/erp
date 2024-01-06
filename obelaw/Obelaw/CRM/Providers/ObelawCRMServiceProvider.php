<?php

namespace Obelaw\CRM\Providers;

use Livewire\Livewire;
use Obelaw\CRM\Livewire\HomeLeadComponent;
use Obelaw\CRM\Livewire\Leads\CreateLeadComponent;
use Obelaw\CRM\Livewire\Leads\IndexLeadsComponent;
use Obelaw\CRM\Livewire\Leads\Views\LeadInfo;
use Obelaw\CRM\Services\LeadService;
use Obelaw\Framework\Base\ServiceProviderBase;

class ObelawCRMServiceProvider extends ServiceProviderBase
{

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('obelaw.crm.leads', LeadService::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Livewire::component('obelaw-crm-home', HomeLeadComponent::class);

        Livewire::component('obelaw-crm-leads-index', IndexLeadsComponent::class);
        Livewire::component('obelaw-crm-leads-create', CreateLeadComponent::class);

        Livewire::component('obelaw-crm-lead-view-info', LeadInfo::class);

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'obelaw-crm');
    }
}
