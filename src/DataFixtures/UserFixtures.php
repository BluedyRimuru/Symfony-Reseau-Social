<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture implements OrderedFixtureInterface
{
    private $EncoderPassword;

    private $counterUser = 1;

    private $counterMoniteur = 1;

    private $counterImage = 1;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->EncoderPassword = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        // Administrateur
        $this->loadUser($manager, ["ROLE_ADMIN"], 1, "admin");
        // Moniteur
        // $this->loadUser($manager, ["ROLE_MONITEUR"], 10, "michel");
        // Elève
        $this->loadUser($manager, ["ROLE_USER"], 50, "michel");

        // add parameter -> $manager, role, nombreEntité, password
    }

    public function loadUser(ObjectManager $manager, array $role, int $nbEntity, String $motdepasse): void {
        $faker = Factory::create();

        for ($i = 1; $i <= $nbEntity; $i++)
        {
            $user = new \App\Entity\User();
            $user->setPseudo($faker->userName());
            $user->setEmail($faker->email());
            $user->setPassword($this->EncoderPassword->hashPassword($user, $motdepasse));
            $user->setRoles($role);
//            $image = new Image();
//            $image->setPath('image/avatar_default.png');
//            $user->setImage($image);

            if ($role == ["ROLE_USER"]) {
                $this->addReference('user-'.$this->counterUser, $user);

                $this->counterUser++;
            } else if ($role == ["ROLE_MONITEUR"]) {
                $this->addReference('moniteur-'.$this->counterMoniteur, $user);
                $this->counterMoniteur++;
            }
            $manager->persist($user);
        }
        $manager->flush();
    }
    public function getOrder(): int
    {
        return 1; // smaller means sooner
    }
}