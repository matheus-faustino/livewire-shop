<?php

namespace App\Livewire\Pages\Products;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Show product')]
class Show extends Component
{
    public Product $product;

    public function render(): View
    {
        return view('livewire.pages.products.show');
    }
}
