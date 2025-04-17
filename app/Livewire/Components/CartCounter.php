<?php

namespace App\Livewire\Components;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\On;
use Livewire\Attributes\Session;
use Livewire\Component;

class CartCounter extends Component
{
    #[Session]
    public ?int $counter = 0;

    public function render(): View
    {
        return view('livewire.components.cart-counter');
    }

    #[On('product-added')]
    public function increaseProductsCount(): void
    {
        $this->counter++;
    }

    #[On('product-removed')]
    public function decreaseProductsCount(): void
    {
        $this->counter--;
    }
}
