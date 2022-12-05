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
        // $cartItems = collect(Cart::name('shopping')->getItems([
        //     'id' => $this->product->id
        // ]));

        // $this->cartItems = $cartItems;

        // if (!$this->cartItems->isEmpty())
        //     $this->count = $this->cartItems->first()->getQuantity();
        // else
        //     $this->count = 1;
    }

    public function addToCart()
    {
        $cart = collect(Cart::name("shopping")->getItems([
            'associated_class' => 'App\Models\Shop\Product',
            'id' => $this->product->id
        ]));

        if ($cart->isEmpty()) {
            $cart = $this->product->addToCart(
                'shopping',
                [
                    "id" => $this->product->id,
                    'title' => $this->product->name,
                    "price" => $this->product->price,
                    'quantity' => $this->count
                ]
            );
        } else {
            $cart->updateItem($this->cartItems->first()->getHash, [
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
