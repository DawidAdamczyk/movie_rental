<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
         $this->passwordEncoder = $passwordEncoder;
    }
    
    public function load(ObjectManager $manager)
    {
    //     $user = new User();
    //     $user->setEmail('dupa@gmail.com');
    //     $user->setName('Kacper');
    //     $user->setLastname('Orzech');
    //     $user->setCardNumber(12345);
    //     $user->setRoles([]);
    //     $user->setBlocked(false);
    //     $user->setPassword($this->passwordEncoder->encodePassword(
    //                     $user,
    //                      'dupa'
    // ));
    // $manager->persist($user);
    // $manager->flush();
    }
}