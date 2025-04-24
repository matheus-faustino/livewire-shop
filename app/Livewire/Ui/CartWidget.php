<?php

namespace App\Livewire\Ui;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\On;
use Livewire\Attributes\Session;
use Livewire\Component;
use NumberFormatter;

class CartWidget extends Component
{
    public bool $isOpen = false;

    // Here "products" needs to be an array because the Livewire session doesn't handle Collections well
    #[Session]
    public array $products = [];

    public function render(): View
    {
        return view('livewire.ui.cart-widget');
    }

    #[On('product-added')]
    public function addProduct(int $productId): void
    {
        $product = Product::find($productId);

        array_push($this->products, $product);
    }

    #[On('product-removed')]
    public function removeProduct(int $index): void
    {
        unset($this->products[$index]);
    }

    #[On('toggle-open')]
    public function toggleOpen(): void
    {
        $this->isOpen = !$this->isOpen;
    }

    public function getTotalPrice(): string
    {
        $formatter = new NumberFormatter('en-US', NumberFormatter::CURRENCY);

        $total = array_reduce($this->products, function (float $total, Product $product) {
            return $total + $product->price;
        }, 0);

        return $formatter->formatCurrency($total, 'USD');
    }
}
