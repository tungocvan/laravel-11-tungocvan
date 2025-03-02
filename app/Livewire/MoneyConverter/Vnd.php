<?php

namespace App\Livewire\MoneyConverter;

use Livewire\Component;

class Vnd extends Component
{
    public $vnd = 0;
    public $usd = 0;

    public function mounted($usd, $vnd)
    {
        $this->usd = $usd;
        $this->vnd = $vnd;
    }

    public function updated($key, $value)
    {
        if ($value === '') {
            $value = 0;
        }
        $this->dispatch('vnd-change', $value);
    }
    public function render()
    {
        return view('livewire.money-converter.vnd');
    }
}