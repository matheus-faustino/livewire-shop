<?php

namespace App\Http\Controllers;

use App\Interfaces\Services\ProductServiceInterface;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Stripe\Webhook;

class StripeWebhookController extends Controller
{
    private ProductServiceInterface $productService;

    public function __construct(ProductServiceInterface $productService)
    {
        $this->productService = $productService;
    }

    public function handleWebhook(Request $request): JsonResponse
    {
        $payload = $request->getContent();
        $sigHeader = $request->header('Stripe-Signature');
        $webhookSecret = config('stripe.webhook_secret');

        try {
            $event = Webhook::constructEvent($payload, $sigHeader, $webhookSecret);

            if (in_array($event->type, ['product.created', 'product.updated', 'price.created', 'price.updated'])) {
                $this->productService->syncProducts();
            }

            return response()->json('Webhook handled', 200);
        } catch (Exception $e) {
            return response()->json('Webhook error: ' . $e->getMessage(), 400);
        }
    }
}
