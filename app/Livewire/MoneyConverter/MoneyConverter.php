<?php

namespace App\Livewire\MoneyConverter;

use Livewire\Component;
use Livewire\Attributes\On;

class MoneyConverter extends Component
{
    public $vnd = 0;
    public $usd = 0;
    public $key = null;
    #[On('vnd-change')]
    public function convertVndToUsd($vnd)
    {
        $this->usd = round((int)$vnd / 25000, 2);
    }

    #[On('usd-change')]
    public function convertUsdToVnd($usd)
    {
        $this->vnd = $usd * 25000;
    }

    public function handleReset()
    {
        $this->key = rand();
        $this->vnd = 0;
        $this->usd = 0;
    }

    public function render()
    {
        return view('livewire.money-converter.money-converter');
    }
}