<?php

namespace App\Http\Livewire\Cart;

use Jackiedo\Cart\Facades\Cart as FacadesCart;
use Livewire\Component;

class Cart extends Component
{
    protected $listeners = ['cartUpdated' => '$refresh'];

    public function payment()
    {
        $order =  auth()->user()->orders()->create([
            'price' => FacadesCart::name("shopping")->getDetails()->total + env("DELIVERY_PRICE"),
            'status' => 'unpaid'
        ]);

        $cartItems = FacadesCart::name("shopping")->getItems();
        $dataAttach = [];

        foreach ($cartItems as $hash => $item) {

            $dataAttach[$item->getModel()->id] = ['price' => $item->getModel()->price];
        }

        $order->courses()->attach($dataAttach);

        FacadesCart::clearItems();

        return redirect(route('payment', $order));

        // $this->emit('addressUpdate');
    }

    public function render()
    {
        return view('livewire.cart.cart')
            ->extends('layouts.template-master')
            ->section('content');
    }
}
