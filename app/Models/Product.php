<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use NumberFormatter;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $fillable = ['slug', 'name', 'description', 'price', 'image_url'];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * Get the formatted product price
     * 
     * @return string
     */
    public function getFormattedPrice(): string
    {
        $formatter = new NumberFormatter('en-US', NumberFormatter::CURRENCY);

        return $formatter->formatCurrency($this->price, 'USD');
    }
}
