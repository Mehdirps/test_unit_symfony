<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 4; $i++) {
            $user = new User();
            $user->setFirstname('User' . $i);
            $user->setLastname('User' . $i);
            $user->setEmail('mehdi' . $i . '@gmail.com');
            $user->setPassword(password_hash('password', PASSWORD_BCRYPT));
            $user->setRoles(['ROLE_USER']);
            $manager->persist($user);
        }

        $userAdmin = new User();
        $userAdmin->setFirstname('Admin');
        $userAdmin->setLastname('Admin');
        $userAdmin->setEmail('admin@gmail.com');
        $userAdmin->setPassword(password_hash('password', PASSWORD_BCRYPT));
        $userAdmin->setRoles(['ROLE_ADMIN']);
        $manager->persist($userAdmin);

        $manager->flush();
    }
}
