<?php

namespace App\Livewire\Member;

use App\Enums\Country;
use Livewire\Component;

class Create extends Component
{
    public array $countries;

    public string $firstName;

    public string $lastName;

    public string $phone;

    public string $address;

    public string $city;

    public string $state;

    public string $zip;

    public string $country;

    public string $birthDate;

    public string $birthPlace;

    public string $email;

    public string $gender;

    public bool $isActive;

    public string $baptismDate;

    public string $maritalStatus;

    public function render()
    {
        return view('livewire.member.create');
    }

    public function mount()
    {
        $this->countries = Country::getCountries();
        $this->isActive = true;
        $this->gender = 'm';
        $this->maritalStatus = 'single';
    }
}
