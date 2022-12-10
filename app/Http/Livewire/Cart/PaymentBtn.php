<?php

namespace App\Http\Livewire\Cart;

use App\Models\Order;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class PaymentBtn extends Component
{
    use AuthorizesRequests;

    public Order $order;

    public function mount($order)
    {
        $this->order = $order;
    }


    public function checkUserInfo()
    {
        $this->emit('checkUserInfo', $this->order);
    }

    public function render()
    {
        return view('livewire.cart.payment-btn');
    }
}
