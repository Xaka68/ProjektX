<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use function Symfony\Component\String\u;

class UserFixtures extends Fixture
{
    public function __construct(
        private UserPasswordHasherInterface $hasher
    )
    {
    }

    public function load(ObjectManager $manager): void
    {
       $admin1 = new User();
       $admin1->setEmail('admin1@gmail.com');
       $admin1->setPassword($this->hasher->hashPassword($admin1, 'admin1'));
       $admin1->setRoles(['ROLE_ADMIN']);


       $admin2 = new User();
       $admin2->setEmail('admin2@gmail.com');
       $admin2->setPassword($this->hasher->hashPassword($admin2, 'admin2'));
       $admin2->setRoles(['ROLE_ADMIN']);

       $manager->persist($admin1);
       $manager->persist($admin2);

       for ($i=1; $i<=5; $i++) {
        $user = new User();
        $user->setEmail('user'.$i.'@gmail.com');
        $user->setPassword($this->hasher->hashPassword($user, 'user'.$i));
        $manager->persist($user);
        }

        $manager->flush();
    }
}
