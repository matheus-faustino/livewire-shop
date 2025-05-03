<?php

namespace App\Services;

use App\Interfaces\Services\CheckoutServiceInterface;
use Illuminate\Http\RedirectResponse;
use Stripe\StripeClient;
use Stripe\Checkout\Session;

class CheckoutService implements CheckoutServiceInterface
{
    private StripeClient $stripeClient;

    public function __construct()
    {
        $this->stripeClient = new StripeClient(config('stripe.secret'));
    }

    public function createCheckoutSession(): Session
    {
        $cartProducts = session('cart.products');

        $lineItems = [];

        foreach ($cartProducts as $cartProduct) {

            $product = $cartProduct['product'];
            $quantity = $cartProduct['quantity'];

            $lineItems[] = [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $product->name,
                        'description' => $product->description,
                        'images' => [$product->image_url],
                    ],
                    'unit_amount' => (int)($product->price * 100),
                ],
                'quantity' => $quantity,
            ];
        }

        return $this->stripeClient->checkout->sessions->create([
            'payment_method_types' => ['card'],
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('checkouts.sucess'),
            'cancel_url' => route('checkouts.cancel'),
        ]);
    }
}
