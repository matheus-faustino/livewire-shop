<?php

namespace App\Livewire\Ui;

use Illuminate\Contracts\View\View;
use Livewire\Component;
use App\Models\Product as ProductModel;

class ProductCard extends Component
{
    public ProductModel $product;

    public function render(): View
    {
        return view('livewire.ui.product-card');
    }
}
