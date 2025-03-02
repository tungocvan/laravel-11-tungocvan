<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    #[Title("Unicode Academy")]

    public function render()
    {

        return view('livewire.dashboard.index');
    }
}