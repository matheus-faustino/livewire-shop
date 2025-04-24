<?php

namespace App\Livewire\Ui;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\On;
use Livewire\Attributes\Session;
use Livewire\Component;

class CartBadge extends Component
{
    #[Session]
    public ?int $counter = 0;

    public function render(): View
    {
        return view('livewire.ui.cart-badge');
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
