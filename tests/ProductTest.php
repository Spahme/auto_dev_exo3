<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

use App\Entity\Product;

class ProductTest extends TestCase
{

    public function testProductHasName()
    {
        $product = new Product('Apple', ['USD' => 1.0], 'food');
        $this->assertEquals('Apple', $product->getName());
    }

    public function testProductSetPrices()
    {
        $product = new Product('Apple', ['USD' => 1.0], 'food');
        $this->assertEquals(['USD' => 1.0], $product->getPrices());
    }
    
}
