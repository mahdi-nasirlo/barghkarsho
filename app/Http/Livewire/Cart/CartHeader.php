<?php

namespace App\Http\Livewire\Cart;

use Jackiedo\Cart\Facades\Cart;
use Livewire\Component;

class CartHeader extends Component
{
    protected $listeners = ['cartUpdated' => '$refresh'];
    protected $carts;

    public function updateHeader()
    {
        // $items = Cart::getItems();

        // foreach ($items as $hash => $item) {
        //     dd($item->attributes);
        // }

        // $items = Cart::name('shopping')->getItems();

        // // dd($items[0]);
        // foreach ($items as $hash => $item) {
        //     dd($item->getModel());
        // }
    }

    public function render()
    {
        $carts = $this->carts = Cart::name('shopping')->getItems();
        return view('livewire.cart.cart-header', ['carts' => $carts]);
    }
}
