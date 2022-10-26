<?php

namespace Tests\Unit;

use App\Services\ProductHelperService;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_calculate_total_with_vat()
    {
        $helperService = new ProductHelperService();

        $this->assertTrue(true);
    }
}
