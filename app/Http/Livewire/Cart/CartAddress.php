<?php

namespace App\Http\Livewire\Cart;

use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Illuminate\Support\Facades\Gate;


class CartAddress extends Component
{
    use LivewireAlert;

    protected $listeners = ['checkUserInfo' => 'payment'];

    public $name = "";
    public $city = "";
    public $state = "";
    public $address = "";
    public $post = "";
    public $mobile = "";


    protected $rules = [
        'name' => 'required|min:8',
        'state' => 'required',
        'city' => 'required',
        'address' => 'required',
        'post' => 'required',
        'mobile' => ['required'],
    ];

    public function payment(Order $order)
    {
        $this->validate();

        return redirect(route("payment", $order));
    }


    public function mount()
    {
        $user = auth()->user();

        $this->name = $user->last_name;
        $this->state = $user->state;
        $this->city = $user->city;
        $this->address = $user->address;
        $this->post = $user->post;
        $this->mobile = $user->mobile;
    }

    public function saveinformation()
    {
        $this->validate();

        auth()->user()->update(
            [
                'last_name' => $this->name,
                'state' => $this->state,
                'city' => $this->city,
                'address' => $this->address,
                'post' => $this->post,
                'mobile' => $this->mobile
            ]
        );

        session()->flash("message", "اطلاعات با موفقیت ثبت شد.");
    }

    public function render()
    {
        return view('livewire.cart.cart-address')
            ->extends('layouts.template-master')
            ->section('content');
    }
}
