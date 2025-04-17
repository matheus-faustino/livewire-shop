<?php

namespace App\Livewire\Components;

use Illuminate\Contracts\View\View;
use Livewire\Component;
use App\Models\Product as ProductModel;

class Product extends Component
{
    public ProductModel $product;

    public function render(): View
    {
        return view('livewire.components.product');
    }
}
