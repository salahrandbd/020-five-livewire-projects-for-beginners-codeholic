<?php

namespace App\Http\Livewire;

use App\Models\City;
use App\Models\Country;
use Livewire\Component;

class CascadingDropdown extends Component
{
  public $countries = [];
  public $cities = [];

  public $selectedCountry;

  public function render()
  {
    return view('livewire.cascading-dropdown');
  }

  public function mount(): void
  {
    $this->countries = Country::all();
  }

  public function onCountryChange(): void
  {
    sleep(1);
    if($this->selectedCountry != '') {
      $this->cities = City::where('country_id', $this->selectedCountry)->get();
    }
  }
}
