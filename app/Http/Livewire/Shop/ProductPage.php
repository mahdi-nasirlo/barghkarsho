<?php

namespace App\Http\Livewire\Shop;

use App\Models\Shop\Product;
use Jackiedo\Cart\Facades\Cart;
use Livewire\Component;

class ProductPage extends Component
{
    public Product $product;
    public $count = 1;

    public function mount()
    {
        $cartItems = collect(Cart::name("shopping")->getItems([
            'associated_class' => 'App\Models\Shop\Product',
            'id' => $this->product->id
        ]));

        if ($cartItems->isEmpty())
            $this->count = 1;
        else
            $this->count = $cartItems->first()->get('quantity');
    }

    public function increment()
    {
        if ($this->product->inventory > $this->count) {
            $this->count++;
        }
    }

    public function decrement()
    {
        if ($this->count > 1) {
            $this->count--;
        }
    }

    public function addToCart()
    {
        $cart = collect(Cart::name("shopping")->getItems([
            'associated_class' => 'App\Models\Shop\Product',
            'id' => $this->product->id
        ]));

        if ($cart->isEmpty()) {
            $this->product->addToCart(
                'shopping',
                [
                    "id" => $this->product->id,
                    'title' => $this->product->name,
                    "price" => $this->product->price,
                    'quantity' => $this->count
                ]
            );
        } else {
            Cart::name("shopping")->updateItem($cart->first()->getHash(), [
                'quantity' => $this->count
            ]);
        }

        //     // if ($this->course->discountItem) {
        //     //     $cart = Cart::name('shopping');

        //     //     $action = $cart->applyAction([
        //     //         'id' => $this->course->id,
        //     //         'title' => 'Discount 10%',
        //     //         'value' => '-18%'
        //     //     ]);
        //     // }

        $this->emit('cartUpdated');
    }

    public function render()
    {

        // dd(Cart::name("shopping")->getItems());
        return view('livewire.shop.product-page');
    }
}

// TODO fix meta tag of new page product list and product single
