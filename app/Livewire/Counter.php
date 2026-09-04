<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.app')]
#[Title('Counter')]
class Counter extends Component
{
    public int $counter = 0;

    public function increment() : void
    {
        $this->counter++;
    }

    public function decrement() : void
    {
        if ($this->counter > 0) {
            $this->counter--;
        }
    }

    public function render()
    {
        return view('livewire.counter');
    }
}
