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
use Illuminate\Support\Str;

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
            )
            ->through([
                new Order($this->order),
                new AttributesFilter($this->filter),
                new Search($this->search),
            ])
            ->thenReturn()
            ->paginate(20);

        return view('livewire.shop.product-list', compact('products'));
    }

    public function filterIsEnable($filterName)
    {
        return collect($this->filter)->filter(function ($item) use ($filterName) {
            return Str::contains($item, $filterName);
        })->count() > 0;
    }
}
