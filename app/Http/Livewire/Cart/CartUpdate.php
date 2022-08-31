<?php

namespace App\Http\Livewire\Cart;

use App\Helper\Cart\Cart;
use Livewire\Component;

class CartUpdate extends Component
{
    public $cartItems = [];
    public $quantity = 1;
    public $inventory;

    public function mount($item)
    {
        $this->cartItems = $item;

        $this->quantity = $item['quantity'];

        $this->inventory = $item['item']->inventory;
    }

    public function updateCart()
    {
        Cart::update($this->cartItems['id'], [
            'quantity' =>  $this->quantity
        ]);

        $this->emit('cartUpdated');
    }

    public function render()
    {
        return view('livewire.cart.cart-update');
    }
}
