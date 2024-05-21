<?php

namespace Obelaw\Contacts\Livewire\Addresses;

use Obelaw\Contacts\Models\Address;
use Obelaw\Contacts\Models\Pins\Area;
use Obelaw\Contacts\Models\Pins\City;
use Obelaw\Contacts\Models\Pins\State;
use Obelaw\Permissions\Attributes\Access;
use Obelaw\UI\Renderer\FormRender;

#[Access('contacts_contacts_create')]
class UpdateAddressesComponent extends FormRender
{
    public $formId = 'obelaw_helper_contacts_addresses_form';

    protected $pretitle = 'Contacts';
    protected $title = 'Create new contact';

    public $address = null;

    public function mount(Address $address)
    {
        $this->address = $address;

        $this->setInputs([
            'contact_id' => $address->contact_id,
            'label' => $address->label,
            'country_id' => $address->country_id,
            'city_id' => $address->city_id,
            'state_id' => $address->state_id,
            'area_id' => $address->area_id,
            'postcode' => $address->postcode,
            'street_line_1' => $address->street_line_1,
            'street_line_2' => $address->street_line_2,
            'phone_number' => $address->phone_number,
            'is_main' => $address->is_main,
        ]);

        $this->setChoices('city_id', City::where('parent_id', $address->country_id)->get()->map(function ($city) {
            return [
                'label' => $city->name,
                'value' => $city->id,
            ];
        })->toArray());

        $this->setChoices('state_id', State::where('parent_id', $address->city_id)->get()->map(function ($city) {
            return [
                'label' => $city->name,
                'value' => $city->id,
            ];
        })->toArray());

        $this->setChoices('area_id', Area::where('parent_id', $address->state_id)->get()->map(function ($city) {
            return [
                'label' => $city->name,
                'value' => $city->id,
            ];
        })->toArray());
    }


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

        $this->address->update($validateData);

        return $this->pushAlert('success', 'The address has been updated');
    }
}
