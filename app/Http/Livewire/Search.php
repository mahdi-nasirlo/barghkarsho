<?php

namespace App\Http\Livewire;

use App\Models\Shop\Product;
use Livewire\Component;

class Search extends Component
{
    public $string = 'سیماران';

    public $queryString = [
        'string'
    ];

    public function mount()
    {
        // dd(Product::query()->where('name', 'link', '%' . $this->string . '%')->get());
        // return $this->result = "lsdjkfkl";
    }

    public function render()
    {
        $result = Product::query()->where('name', 'like', '%' . $this->string . '%')->get();


        return view('livewire.search', ['result' => $result]);
    }
}
