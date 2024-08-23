<?php

namespace App\Tests\Entity;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class UserTest extends KernelTestCase
{
    public function testSetGetFirstname()
    {
        $user = new User();
        $user->setFirstname('John');
        $this->assertEquals("John", $user->getFirstname());
    }

    public function testSetGetLastname()
    {
        $user = new User();
        $user->setLastname('Doe');
        $this->assertEquals("Doe", $user->getLastname());
    }

    public function testSetGetEmail()
    {
        $user = new User();
        $user->setEmail('john@doe.com');
        $this->assertEquals('john@doe.com', $user->getEmail());
    }

    public function testSetGetPassword()
    {
        $user = new User();
        $user->setPassword('password');
        $this->assertEquals('password', $user->getPassword());
    }

    public function testSetGetRoles()
    {
        $user = new User();
        $user->setRoles(['ROLE_USER']);
        $this->assertContains('ROLE_USER', $user->getRoles());
    }

    public function testGetUserIdentifier()
    {
        $user = new User();
        $user->setEmail('johndoe@mail.com');
        $this->assertEquals('johndoe@mail.com', $user->getUserIdentifier());
    }
}
