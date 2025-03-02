<?php

namespace App\Livewire\MoneyConverter;

use Livewire\Component;

class Usd extends Component
{
    public $usd = 0;
    public $vnd = 0;
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

        $this->dispatch('usd-change', $value);
    }

    public function render()
    {
        return view('livewire.money-converter.usd');
    }
}