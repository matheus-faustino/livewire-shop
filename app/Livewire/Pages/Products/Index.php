<?php

namespace App\Livewire\Pages\Products;

use App\Interfaces\Services\ProductServiceInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Products')]
class Index extends Component
{
    public Collection $products;

    public function render(): View
    {
        return view('livewire.pages.products.index');
    }

    public function mount(ProductServiceInterface $productService): void
    {
        $this->products = $productService->all();
    }
}
