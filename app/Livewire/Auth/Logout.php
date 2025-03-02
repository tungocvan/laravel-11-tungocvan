<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Logout extends Component
{

    public function render()
    {
        return <<<HTML
        <a href="#" class="nav-link" wire:click.prevent="handleLogout">Đăng xuất</a>
        HTML;
    }

    public function handleLogout()
    {
        Auth::logout();
        return $this->redirect(route('auth.login'), true);
    }
}