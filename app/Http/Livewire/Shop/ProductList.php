<?php

namespace App\Http\Livewire\Shop;

use App\Http\Filters\AttributesFilter;
use App\Http\Filters\Order;
use App\Http\Filters\Search;
use App\Models\Shop\Product;
use App\Models\Shop\ShopCategory;
use Illuminate\Pipeline\Pipeline;
use Livewire\Component;
use Livewire\WithPagination;

class ProductList extends Component
{
    use WithPagination;

    public ShopCategory $shopCategory;

    public $filter = [];

    public $search;

    public $order = 'last';

    protected $queryString = [
        'filter',
        'search',
        'order'
    ];

    // public function mount()
    // {
    //     $this->category->load('products');
    // }

    public function render()
    {
        $products =
            app(Pipeline::class)
            ->send(
                Product::query()
                    ->where('category_id', $this->shopCategory->id)
                    ->with(['attributes'])
                // ->orderBy('price', 'desc')
            )
            ->through([
                new Order($this->order),
                new AttributesFilter($this->filter),
                new Search($this->search),
            ])
            ->thenReturn()
            // ->get("cover");
            ->paginate(20);

        return view('livewire.shop.product-list', compact('products'))
            ->layout('layouts.template-master');
    }
}
