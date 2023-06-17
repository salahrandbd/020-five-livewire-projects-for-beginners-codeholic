<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductSearch extends Component
{
  use WithPagination;

  public string $search = '';

  protected $queryString = ['search'];

  public function render()
  {
    $products = Product::
      where('title', 'like', "%{$this->search}%")
      ->orWhere('description', 'like', "%{$this->search}%")
      ->paginate(10);

    return view('livewire.product-search', compact('products'));
  }

  public function updated($property)
  {
    if($property === 'search') {
      $this->resetPage();
    }
  }
}
