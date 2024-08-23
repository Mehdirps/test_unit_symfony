<?php

namespace App\Tests\Entity;

use App\Entity\Order;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class OrderTest extends KernelTestCase
{
    public function testSetGetNumber()
    {
        $order = new Order();
        $order->setNumber(1);
        $this->assertEquals(1, $order->getNumber());
    }

    public function testSetGetTotalPrice()
    {
        $order = new Order();
        $order->setTotalPrice('100.00');
        $this->assertEquals('100.00', $order->getTotalPrice());
    }

    public function testSetGetUserId()
    {
        $user = new User();
        $user->setEmail('mehdi@mehdi.com');
        $order = new Order();
        $order->setUser($user);
        $this->assertEquals('mehdi@mehdi.com', $order->getUser()->getEmail());
    }
}
