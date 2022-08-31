<?php

namespace App\Http\Livewire\Cart;

use Livewire\Component;

class Cart extends Component
{
    protected $listeners = ['cartUpdated' => '$refresh'];

    public function render()
    {
        return view('livewire.cart.cart')
            ->extends('layouts.template-master')
            ->section('content');
    }
}
