<?php

namespace App\Livewire\Ui;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\On;
use Livewire\Attributes\Session;
use Livewire\Component;
use NumberFormatter;

class CartBadge extends Component
{
    #[Session('cart.products')]
    public array $products = [];

    public bool $isOpen = false;

    public function render(): View
    {
        return view('livewire.ui.cart-badge');
    }

    #[On('product-added')]
    public function addProduct(int $productId): void
    {
        $product = Product::find($productId);

        $existingProductIndex = $this->findProductIndexById($productId);

        if ($existingProductIndex !== false) {
            $this->products[$existingProductIndex]['quantity']++;
        } else {
            $this->products[] = [
                'product' => $product,
                'quantity' => 1
            ];
        }
    }

    #[On('update-quantity')]
    public function updateQuantity(int $productId, int $quantity): void
    {
        $index = $this->findProductIndexById($productId);

        if ($index !== false) {
            if ($quantity <= 0) {
                $this->removeProduct($index);
            } else {
                $this->products[$index]['quantity'] = $quantity;
            }
        }
    }

    #[On('product-removed')]
    public function removeProduct(int $index): void
    {
        if (isset($this->products[$index])) {
            array_splice($this->products, $index, 1);
        }
    }

    #[On('toggle-open')]
    public function toggleOpen(): void
    {
        $this->isOpen = !$this->isOpen;
    }

    public function getTotalPrice(): string
    {
        $formatter = new NumberFormatter('en-US', NumberFormatter::CURRENCY);

        $total = array_reduce($this->products, function (float $total, array $item) {
            return $total + ($item['product']->price * $item['quantity']);
        }, 0);

        return $formatter->formatCurrency($total, 'USD');
    }

    public function getTotalQuantity(): int
    {
        return array_reduce($this->products, fn($carry, $item) => $carry + $item['quantity']);
    }

    private function findProductIndexById(int $productId): int|false
    {
        foreach ($this->products as $index => $item) {
            if ($item['product']->id === $productId) {
                return $index;
            }
        }

        return false;
    }
}
