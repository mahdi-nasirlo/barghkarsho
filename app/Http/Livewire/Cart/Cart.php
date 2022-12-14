<?php

namespace App\Http\Livewire\Cart;

use App\Models\Order;
use Artesaos\SEOTools\Facades\SEOMeta;
use Jackiedo\Cart\Facades\Cart as FacadesCart;
use Livewire\Component;

class Cart extends Component
{
    protected $listeners = [
        'cartUpdated' => '$refresh',
        'header_payment' => 'payment'
    ];

    public function payment()
    {
        $totalPrice = FacadesCart::name("shopping")->getDetails()->total;
        $deliveryPrice = $totalPrice >  env('DELIVERY_PRICE_MIN_CON') ? 0 : $totalPrice;
        $totalPriceWithDelivery = $totalPrice + $deliveryPrice;

        $order =  auth()->user()->orders()->create([
            'price' => $totalPriceWithDelivery,
            'status' => 'unpaid'
        ]);

        $cartItems = collect(FacadesCart::name("shopping")->getItems())->map(function ($item) {
            return [
                'orderable_id' => $item->get('id'),
                'orderable_type' => get_class($item->getModel()),
                'price' => $item->getModel()->price
            ];
        })->toArray();

        $order->orderItems()->createMany($cartItems);

        FacadesCart::clearItems();

        $this->emit('addressUpdate');

        return redirect(route("cart.address", $order));
    }

    public function render()
    {
        SEOMeta::setTitle("سبد خرید")
            ->addMeta("designer", env("DESIGNER"));

        return view('livewire.cart.cart')
            ->extends('layouts.template-master')
            ->section('content');
    }
}
