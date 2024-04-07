<?php

namespace Obelaw\Contacts\Livewire\Addresses;

use Obelaw\Contacts\Models\Address;
use Obelaw\Contacts\Models\Pins\Area;
use Obelaw\Contacts\Models\Pins\City;
use Obelaw\Contacts\Models\Pins\State;
use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Renderer\FormRender;

#[Access('contacts_contacts_create')]
class CreateAddressesComponent extends FormRender
{
    public $formId = 'obelaw_helper_contacts_addresses_form';

    protected $pretitle = 'Contacts';
    protected $title = 'Create new contact';

    public function getCities()
    {
        $this->setChoices('city_id', City::where('parent_id', $this->inputs['country_id'])->get()->map(function ($city) {
            return [
                'label' => $city->name,
                'value' => $city->id,
            ];
        })->toArray());
    }

    public function getStates()
    {
        $this->setChoices('state_id', State::where('parent_id', $this->inputs['city_id'])->get()->map(function ($city) {
            return [
                'label' => $city->name,
                'value' => $city->id,
            ];
        })->toArray());
    }

    public function getZone()
    {
        $this->setChoices('area_id', Area::where('parent_id', $this->inputs['state_id'])->get()->map(function ($city) {
            return [
                'label' => $city->name,
                'value' => $city->id,
            ];
        })->toArray());
    }

    public function submit()
    {
        $validateData = $this->getInputs();

        $validateData['is_main'] = null;

        Address::create($validateData);

        return $this->pushAlert('success', 'The address has been created');
    }
}
