<?php

namespace Tests\Unit;

use App\Models\Product;
use App\Services\ProductHelperService;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCalculatePriceWithVat()
    {
        $helper = new ProductHelperService();

        $product = new Product();
        $product->title = "Test Product";
        $product->quantity = 10;
        $product->price = 12.25;

        $vat = 0.2;

        $this->assertEquals(147, $helper->calculateTotalWithVAT($product, $vat));
    }
}
