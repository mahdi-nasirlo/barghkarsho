<?php

namespace App\Http\Livewire\Cart;

use App\Models\Order;
use App\Models\Shop\Discount as ShopDiscount;
use Livewire\Component;

class Discount extends Component
{
    public $code;
    public $order;
    public $discount = null;

    public function mount(Order $order)
    {
        $this->order = $order;
        if ($order->discount_percent) {
            $this->code = false;
            $this->discount = $order->discount_percent;
        }
    }

    protected $rules = [
        'code' => 'required|exists:discounts,code',
    ];

    public function checkDiscount()
    {
        $this->validate();

        // if ($this->discount) {
        //     session()->flash("discountError", " کد تخفیف قبلا اعمال شده است.");
        // } else {
        //     $discount = ShopDiscount::where("code", $this->code)->whereDate('expired_at', ">", date("Y-m-d h:i:s"));


        //     if ($discount->count() > 0) {

        //         $this->order->update([
        //             'discount_percent' => $discount->first()->percent
        //         ]);

        //         $this->discount = $discount->first();
        //         session()->flash("discount", $discount->first()->percent . " درصد تخفیف تایید شد.");
        //     }
        // }
    }
    public function render()
    {
        return view('livewire.cart.discount');
    }
}
