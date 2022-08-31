<?php

namespace App\Http\Livewire\Cart;

use Jackiedo\Cart\Facades\Cart;
use Livewire\Component;

class CartBtn extends Component
{
    public $course;
    public $btnText = "ثبت نام در دروه";
    public $link = "#";

    public function mount($course)
    {
        $this->course = $course;

        if (Cart::name('shopping')->getItems([
            'model' => $this->course,
        ])) {
            $this->btnText = 'ثبت و نهایی سازی خرید     <span style="font-size: 18px">&#10003;</span>';
            $this->link = route("cart.");
        }
    }


    public function addToCart()
    {

        $cart = $this->course->addToCart(
            'shopping',
            [
                "price" => $this->course->price,
                'quantity' => 1
            ]
        );

        $this->btnText = 'ثبت و نهایی سازی خرید     <span style="font-size: 18px">&#10003;</span>';
        $this->link = route("cart.");

        $this->emit('cartUpdated');
    }

    public function render()
    {
        return view('livewire.cart.cart-btn');
    }
}
