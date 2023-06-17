<div class="p-6">
  <form wire:submit.prevent="save" class="flex flex-col w-[400px] mx-auto py-16">
    @if ($uploadedImages)
      Preview:
      <div class="flex flex-wrap justify-center gap-6">
        @foreach ($uploadedImages as $image)
          <img src="{{ $image->temporaryUrl() }}" class="w-16 object-cover">
        @endforeach
      </div>
    @endif

    <input type="file" wire:model="uploadedImages" class="mb-4" multiple>

    @error('images')
      <span class="error">{{ $message }}</span>
    @enderror

    <button type="submit" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-600 rounded text-white">Save Photo</button>
  </form>

  <div class="flex flex-wrap gap-7">
    @foreach ($images as $image)
      <img src="{{ $image }}" class="w-16 object-cover">
    @endforeach
  </div>
</div>
