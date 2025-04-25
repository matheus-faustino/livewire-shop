<?php

namespace App\Interfaces\Services;

interface ProductServiceInterface extends ServiceInterface
{
    public function syncProducts(): void;
}
