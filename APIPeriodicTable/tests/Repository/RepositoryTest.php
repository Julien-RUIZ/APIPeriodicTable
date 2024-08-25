<?php

namespace App\Tests\Repository;

use App\Entity\Atome;
use App\Repository\AtomeDefinitionsRepository;
use App\Repository\AtomeRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class RepositoryTest extends KernelTestCase
{
    /**
     * @dataProvider dataRepository
     */
    public function testCount($repo, $nb, $message){
        self::bootKernel();
        $user = self::getContainer()->get($repo);
        $nbuser = $user->count([]);
        $this->assertEquals($nb, $nbuser, $message);
    }

    public function dataRepository(){
        return [
          [UserRepository::class, 5, 'Erreur du UserRepository'],
            [AtomeRepository::class, 118, 'Erreur du AtomeRepository'],
            [AtomeDefinitionsRepository::class, 13, 'Erreur du AtomeRepository']
        ];
    }
}