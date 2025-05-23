<?php

namespace App\Interfaces\Repositories;

use App\Models\Product;

interface ProductRepositoryInterface extends RepositoryInterface
{
    public function findProductByExternalId(string $externalId): ?Product;
}
