<?php

namespace App\Livewire\Pages\Checkout;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class Cancel extends Component
{
    public function render(): View
    {
        return view('livewire.pages.checkout.cancel');
    }
}
