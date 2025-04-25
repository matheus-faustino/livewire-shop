<?php

namespace App\Services;

use App\Interfaces\Repositories\ProductRepositoryInterface;
use App\Interfaces\Services\ProductServiceInterface;
use Illuminate\Support\Str;
use Stripe\StripeClient;

class ProductService extends BaseService implements ProductServiceInterface
{
    protected $repository;

    private StripeClient $stripeClient;

    public function __construct(ProductRepositoryInterface $repository)
    {
        $this->repository = $repository;
        $this->stripeClient = new StripeClient(config('stripe.secret'));
    }

    public function syncProducts(): void
    {
        $stripeProducts = $this->stripeClient->products->all(['active' => true]);
        $stripePrices = $this->stripeClient->prices->all(['active' => true]);

        $productPrices = [];
        foreach ($stripePrices->data as $price) {
            $productPrices[$price->product] = $price->unit_amount / 100;
        }

        foreach ($stripeProducts->data as $stripeProduct) {
            if (!isset($productPrices[$stripeProduct->id])) {
                continue;
            }

            $existingProduct = $this->repository->findProductByExternalId($stripeProduct->id);

            if ($existingProduct) {
                $this->repository->update($existingProduct->id, [
                    'name' => $stripeProduct->name,
                    'slug' => Str::slug($stripeProduct->name),
                    'description' => $stripeProduct->description ?? '',
                    'price' => $productPrices[$stripeProduct->id],
                    'image_url' => $stripeProduct->images[0],
                ]);
            } else {
                $this->repository->create([
                    'name' => $stripeProduct->name,
                    'slug' => Str::slug($stripeProduct->name),
                    'description' => $stripeProduct->description ?? '',
                    'price' => $productPrices[$stripeProduct->id],
                    'image_url' => $stripeProduct->images[0],
                    'external_id' => $stripeProduct->id,
                ]);
            }
        }
    }
}
