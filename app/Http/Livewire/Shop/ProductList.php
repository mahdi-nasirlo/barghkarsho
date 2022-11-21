<?php

namespace App\Http\Livewire\Shop;

use App\Http\Filters\AttributesFilter;
use App\Http\Filters\Search;
use App\Models\Shop\Product;
use App\Models\Shop\ShopCategory;
use Illuminate\Pipeline\Pipeline;
use Livewire\Component;

class ProductList extends Component
{
    public ShopCategory $shopCategory;

    public $filter = [];

    public $search;

    protected $queryString = [
        'filter',
        'search'
    ];

    public function test()
    {

        dd($this->filter);
    }
    // public function mount()
    // {
    //     $this->category->load('products');
    // }

    public function render()
    {
        $products =
            app(Pipeline::class)
            ->send(Product::query()
                ->where('category_id', $this->shopCategory->id)
                ->with(['attributes']))
            ->through([
                new AttributesFilter($this->filter),
                new Search($this->search)
            ])
            ->thenReturn()
            ->get();

        return view('livewire.shop.product-list', compact('products'))
            ->layout('layouts.template-master');
    }
}
