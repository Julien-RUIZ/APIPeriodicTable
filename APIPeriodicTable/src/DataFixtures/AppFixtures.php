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
     * php bin/console doctrine:fixtures:load --append
     * Ne pas faire de suppression de la bdd avant utilisation de la commande afin d'éviter de perdre toutes les données des éléments. Cependant, vider le contenu de la table user et utiliser la commande ci-dessus.
     * Do not delete the database before using the command to avoid losing all the element data. However, empty the contents of the user table and use the command above.
     */
    public function load(ObjectManager $manager): void
    {
        for ($i=0; $i<3; $i++){
            $user = new User();
            $user->setUsername('user'.$i);
            if($i===0){
                $user->setRoles(['ROLE_SUPER_ADMIN']);
            }elseif ($i===1){
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
