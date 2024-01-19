<?php

use App\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function testIdIsInteger()
    {
        $product = new Product;
        $reflector = new ReflectionClass(Product::class);
        $property = $reflector->getProperty('productId');
        $property->setAccessible(true);

        $value = $property->getValue($product);

        $this->assertIsInt($value);
    }
}