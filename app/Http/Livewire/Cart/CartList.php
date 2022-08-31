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

    // public function payment()
    // {
    //     // if (auth()->user() and auth()->user()->address and Cart::isNeedDelivery()) {
    //     $order =  auth()->user()->orders()->create([
    //         'price' => Cart::totalPrice(true, false),
    //         'status' => 'unpaid'
    //     ]);

    //     Cart::all()->map(function ($cart) use ($order) {
    //         $cart['item']->orders()->attach($order, ['quantity' => $cart['quantity']]);
    //     });

    //     Cart::deleteAll();

    //     return redirect(route('cart.payment', $order));
    //     // }

    //     $this->alert('error', 'لطفا اطلاعات مورد نظر را تکمیل بفرمایید.', [
    //         'position' => 'bottom-start',
    //         'timer' => 3000,
    //         'toast' => true,
    //         'timerProgressBar' => true,
    //         'text' => '',
    //         'width' => '450',
    //     ]);
    //     $this->emit('addressUpdate');
    // }

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
