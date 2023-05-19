<div class="flex flex-col gap-6 w-[400px] mx-auto py-16">
  <select wire:model="selectedCountry" wire:change="onCountryChange">
    <option value="">Please select country</option>
    @foreach ($countries as $country)
      <option value="{{ $country->id }}">{{ $country->name }}</option>
    @endforeach
  </select>
  <div class="flex relative">
    <p wire:loading class="absolute left-0 top-0 right-0 bottom-0 z-10 bg-white bg-opacity-90 py-2 px-3">
      Loading...
    </p>
    <select class="flex-1">
      <option value="">Please select city</option>
      @foreach ($cities as $city)
        <option value="{{ $city->id }}">{{ $city->name }}</option>
      @endforeach
    </select>
  </div>
</div>
