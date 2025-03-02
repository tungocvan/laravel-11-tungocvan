<?php

namespace App\Livewire\Account;

use Livewire\Component;
use Livewire\Attributes\Url;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Auth;

class Account extends Component
{
    #[Title("Tài khoản")]
    public $user;
    #[Url]
    public $tab = 'account';
    public function render()
    {
        $this->user = Auth::user();
        return view('livewire.account.account');
    }
    public function handleChangeTab($tab)
    {
        $this->tab = $tab;
    }
}