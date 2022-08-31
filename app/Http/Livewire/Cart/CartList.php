<?php

namespace App\Http\Livewire\Cart;

use App\Models\Order;
use Exception;
use Illuminate\Support\Str;
use Jackiedo\Cart\Facades\Cart;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class CartList extends Component
{
    // use LivewireAlert;

    // protected $listeners = ['cartUpdated' => '$refresh'];
    protected $cartItems = [];


    public function removeCart($hash)
    {
        Cart::name("shopping")->removeItem($hash);
        $this->emit('cartUpdated');
    }


    // public function clearAllCart()
    // {
    //     Cart::clear();

    //     session()->flash('success', 'All Item Cart Clear Successfully !');
    // }

    public function render()
    {
        $cartItems = $this->cartItems = Cart::name("shopping")->getItems();
        return view('livewire.cart.cart-list', ['cartItems' => $cartItems]);
    }
}
