<?php

namespace App\Livewire\Partials;

use Livewire\Component;
use Livewire\Attributes\On;

class Navigation extends Component
{
    #[On('user-saved')]
    public function render()
    {
        return view('livewire.partials.navigation');
    }
}