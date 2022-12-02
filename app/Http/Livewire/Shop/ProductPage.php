<?php

namespace App\Http\Livewire\Shop;

use App\Models\Shop\Product;
use Jackiedo\Cart\Facades\Cart;
use Livewire\Component;

class ProductPage extends Component
{
    public Product $product;
    public $count = 0;

    public function addToCart()
    {
        // dd($this->count);

        if (empty(Cart::name("shopping")->getItems(['id' => $this->product->id]))) {

            $cart = $this->product->addToCart(
                'shopping',
                [
                    "id" => $this->product->id,
                    'title' => $this->product->name,
                    "price" => $this->product->price,
                    'quantity' => 1
                ]
            );

            // if ($this->course->discountItem) {
            //     $cart = Cart::name('shopping');

            //     $action = $cart->applyAction([
            //         'id' => $this->course->id,
            //         'title' => 'Discount 10%',
            //         'value' => '-18%'
            //     ]);
            // }
        }

        // $this->btnText = 'ثبت و نهایی سازی خرید     <span style="font-size: 18px">&#10003;</span>';
        // $this->link = route("cart.");

        $this->emit('cartUpdated');
    }

    public function render()
    {
        // dd($this->product->attributes[0]->value);
        return view('livewire.shop.product-page');
    }
}

// TODO fix meta tag of new page product list and product single

// TODO add zoom to img cover 
// TODO add related product to page
