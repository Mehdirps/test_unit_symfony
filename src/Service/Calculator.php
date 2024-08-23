<?php

namespace App\Service;

class Calculator
{
    public function getTotalHT(array $products)
    {
        $total = 0;
        foreach ($products as $product) {
            $total += $product['product']->getPrice() * $product['quantity'];
        }

        return $total;
    }

    public function getTotalTTC(array $products, float $tva): float
    {
        $total = $this->getTotalHT($products);

        $totalTTC = $total + $total * $tva / 100;

        return $totalTTC;
    }
}
