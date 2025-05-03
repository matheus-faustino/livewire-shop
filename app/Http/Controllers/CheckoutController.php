<?php

namespace App\Http\Controllers;

use App\Interfaces\Services\CheckoutServiceInterface;
use Illuminate\Http\RedirectResponse;

class CheckoutController extends Controller
{
    private CheckoutServiceInterface $checkoutService;

    public function __construct(CheckoutServiceInterface $checkoutService)
    {
        $this->checkoutService = $checkoutService;
    }

    public function generateCheckoutSession(): RedirectResponse
    {
        $checkoutSession = $this->checkoutService->createCheckoutSession();

        return redirect($checkoutSession->url);
    }
}
