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

        if (Cart::name("shopping")->getItems(['id' => $this->course->id])) {
            $this->btnText = 'ثبت و نهایی سازی خرید     <span style="font-size: 18px">&#10003;</span>';
            $this->link = route("cart.");
        }
    }


    public function addToCart()
    {

        if (empty(Cart::name("shopping")->getItems(['id' => $this->course->id]))) {

            $cart = $this->course->addToCart(
                'shopping',
                [
                    "id" => $this->course->id,
                    "price" => $this->course->price,
                    'quantity' => 1
                ]
            );

            if ($this->course->discountItem) {
                $cart = Cart::name('shopping');

                $action = $cart->applyAction([
                    'id' => $this->course->id,
                    'title' => 'Discount 10%',
                    'value' => '-18%'
                ]);
            }
        }

        $this->btnText = 'ثبت و نهایی سازی خرید     <span style="font-size: 18px">&#10003;</span>';
        $this->link = route("cart.");

        $this->emit('cartUpdated');
    }

    public function render()
    {
        return view('livewire.cart.cart-btn');
    }
}
