<?php

namespace App\Http\Livewire\Profile;

use Livewire\Component;

class ProfileAddress extends Component
{
    public $formStatus = false;

    // public function toggleForm()
    // {
    //     $this->formStatus  = !$this->formStatus;
    // }

    public function render()
    {
        return view('livewire.profile.profile-address');
    }
}
