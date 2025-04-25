<?php

namespace App\Console\Commands;

use App\Interfaces\Services\ProductServiceInterface;
use Exception;
use Illuminate\Console\Command;

class SyncStripeProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'stripe:sync-products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync products from Stripe to the database.';

    /**
     * Execute the console command.
     */
    public function handle(ProductServiceInterface $productService)
    {
        $this->info('Syncing products from Stripe...');

        try {
            $productService->syncProducts();
            $this->info('Successfully synced products from Stripe.');

            return self::SUCCESS;
        } catch (Exception $e) {
            $this->error('Failed to sync products from Stripe: ' . $e->getMessage());

            return self::FAILURE;
        }
    }
}
