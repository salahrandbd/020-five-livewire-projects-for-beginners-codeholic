<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Calculator extends Component
{
  public string $number1 = '';
  public string $number2 = '';
  public string $action = '+';
  public float $result = 0;
  public bool $disabled = false;

  public function render()
  {
    return view('livewire.calculator');
  }

  public function calculate()
  {
    $this->number1 = (float) $this->number1;
    $this->number2 = (float) $this->number2;

    if ($this->action === '-') {
      $this->result = $this->number1 - $this->number2;
    } else if ($this->action === '+') {
      $this->result = $this->number1 + $this->number2;
    } else if ($this->action === '*') {
      $this->result = $this->number1 * $this->number2;
    } else if ($this->action === '/') {
      $this->result = $this->number1 / $this->number2;
    } else if ($this->action === '%') {
      $this->result = $this->number1 / 100 * $this->number2;
    }
  }

  public function updated($property)
  {
    if ($this->number1 == '' || $this->number2 == '') {
      $this->disabled = true;
    } else {
      $this->disabled = false;
    }
  }
}
