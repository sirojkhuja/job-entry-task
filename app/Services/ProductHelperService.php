<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\Config;

class ProductHelperService
{
    public function calculateTotalWithVAT(Product $product, $vat)
    {
        return ($product->quantity * $product->price) * (1 + $vat);
    }
}
