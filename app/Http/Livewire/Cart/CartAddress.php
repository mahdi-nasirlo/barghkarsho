<?php

namespace App\Http\Livewire\Cart;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class CartAddress extends Component
{
    use LivewireAlert;

    protected $listeners = ['addressUpdate' => 'saveinformation'];

    public $name = "";
    public $city = "";
    public $state = "";
    public $address = "";
    public $post = "";
    public $mobile = "";
    public $checkDelivery;

    protected $rules = [
        'name' => 'required|min:8',
        'state' => 'required',
        'city' => 'required',
        'address' => 'required',
        'post' => 'required',
        'mobile' => 'required',
    ];

    public function mount($checkDelivery)
    {
        $this->checkDelivery = $checkDelivery;
        if (auth()->user()) {
            $informaion = auth()->user()->address;

            if ($informaion) {
                $this->name = $informaion->name;
                $this->state = $informaion->state;
                $this->city = $informaion->city;
                $this->address = $informaion->address;
                $this->post = $informaion->post;
                $this->mobile = $informaion->mobile;
            }
        }
    }

    public function saveinformation()
    {
        $this->validate();

        if (auth()->user()) {
            auth()->user()->address()->updateOrCreate(
                [
                    'user_id' => auth()->user()->id
                ],
                [
                    'name' => $this->name,
                    'state' => $this->state,
                    'city' => $this->city,
                    'address' => $this->address,
                    'post' => $this->post,
                    'mobile' => $this->mobile
                ]
            );

            $this->alert('success', 'اطلاعات شما با موفقیت ذخیره شد.', [
                'position' => 'bottom-start',
                'timer' => 3000,
                'toast' => true,
                'timerProgressBar' => true,
                'text' => '',
                'width' => '6000',
            ]);
        }
    }

    public function render()
    {
        return view('livewire.cart.cart-address');
    }
}
