<?php

namespace App\Tests\Service;

use App\Service\Calculator;
use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class CalculatorTest extends KernelTestCase
{

    private $calculator;
    private $products;

    protected function setUp(): void
    {
        $this->calculator = new Calculator();
        $this->products = $this->getProducts();
    }

    protected function tearDown(): void
    {
        $this->calculator = null;
        $this->products = null;
    }

    public function testGetTotalHT()
    {
        $this->assertEquals(130, $this->calculator->getTotalHT($this->products));
    }

    public function testGetTotalTTC()
    {
        $this->assertEquals(143, $this->calculator->getTotalTTC($this->products, 10));
    }

    public function createProduct($price, $name)
    {
        $product = new Product();

        $product->setPrice($price);
        $product->setName($name);

        return $product;
    }

    public function getProducts()
    {
        $products = [
            [
                'product' => $this->createProduct(10, 'product1'),
                'quantity' => 2
            ],
            [
                'product' => $this->createProduct(20, 'product2'),
                'quantity' => 1
            ],
            [
                'product' => $this->createProduct(30, 'product3'),
                'quantity' => 3
            ]
        ];

        return $products;
    }
}
