<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class ImageUpload extends Component
{
  use WithFileUploads;

  public $uploadedImages = [];

  public function save()
  {
    $this->validate([
      'uploadedImages.*' => 'image|max:1024'
    ]);

    foreach ($this->uploadedImages as $image) {
      $image->store('public');
    }
  }

  public function render()
  {
    return view('livewire.image-upload', [
      'images' => collect(Storage::files('public'))
        ->filter(function ($file) {
          return in_array(strtolower(pathinfo($file, PATHINFO_EXTENSION)), ['png', 'jpg', 'jpeg', 'gif', 'webp']);
        })
        ->map(function ($image) {
          return Storage::url($image);
        })
    ]);
  }
}