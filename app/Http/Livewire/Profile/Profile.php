<?php

namespace App\Http\Livewire\Profile;

use Artesaos\SEOTools\Facades\SEOMeta;
use Livewire\Component;

class Profile extends Component
{
    public function render()
    {
        SEOMeta::setTitle("اکانت کاربری")
            ->setDescription("از داشبورد حساب خود می توانید اطلاعات خود را مشاهده کنید سفارشات اخیر, با مدیریت شما آدرس حمل و نقل و صورتحساب, و رمز ورود و جزئیات حساب خود را ویرایش کنید.")
            ->addMeta("designer", env("DESIGNER"));

        return view('livewire.profile.profile')
            ->extends('layouts.template-master')
            ->section('content');
    }
}
