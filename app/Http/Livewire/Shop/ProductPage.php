<?php

namespace App\Http\Livewire\Shop;

use App\Models\Shop\Product;
use Livewire\Component;

class ProductPage extends Component
{
    public Product $product;
    public function render()
    {
        // dd($this->product->attributes[0]->value);
        return view('livewire.shop.product-page');
    }
}

// TODO fix title of page product list product single 
// TODO fix meta tag of new page product list and product single

// TODO add image cover slider 
// TODO add zoom to img cover 
// TODO add data product to page
// TODO add button add to baskets
// TODO add related product to page
// TODO add next and previews products