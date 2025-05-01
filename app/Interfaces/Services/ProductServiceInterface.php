<?php

namespace App\Interfaces\Services;

use App\Models\Product;

interface ProductServiceInterface extends ServiceInterface
{
    public function syncProducts(): void;
    public function findProductByExternalId(string $externalId): Product;
}
