<?php

namespace App\Interfaces\Services;

use Stripe\Checkout\Session;

interface CheckoutServiceInterface
{
    public function createCheckoutSession(): Session;
}