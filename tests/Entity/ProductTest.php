<?php

namespace App\Tests\Entity;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ProductTest extends KernelTestCase
{
    public function testSetGetPrice()
    {
        $product = new Product();
        $product->setPrice(100);
        $this->assertEquals(100, $product->getPrice());
    }

    public function testSetGetName()
    {
        $product = new Product();
        $product->setName('Product 1');
        $this->assertEquals('Product 1', $product->getName());
    }
}