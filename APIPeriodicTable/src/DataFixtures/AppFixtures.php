<?php
declare(strict_types=1);
namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    public function __construct(private readonly UserPasswordHasherInterface $hasher)
    {
    }

    /**
     * php bin/console doctrine:fixtures:load
     */
    public function load(ObjectManager $manager): void
    {
        for ($i=0; $i<5; $i++){
            $user = new User();
            $user->setUsername('user'.$i);
            if($i===0){
                $user->setRoles(['ROLE_ADMIN']);
            }else{
                $user->setRoles(['ROLE_USER']);
            }
            $user->setPassword($this->hasher->hashPassword($user, 'User'.$i.'%'));
            $user->setEmail('user'.$i.'@mail.fr');
            $manager->persist($user);
        }
        $manager->flush();
    }
}
