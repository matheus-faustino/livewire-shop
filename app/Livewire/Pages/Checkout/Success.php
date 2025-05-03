<?php

namespace App\Livewire\Pages\Checkout;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class Success extends Component
{
    public function mount(): void
    {
        session()->forget('cart.products');
    }

    public function render(): View
    {
        return view('livewire.pages.checkout.success');
    }
}
