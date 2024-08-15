<?php

namespace Entity;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class UserTest extends KernelTestCase
{
    private $user;
    public function setUp(): void
    {
        $this->user = new User();
    }

    public function TestUser(User $user, $nberror=0){
        self::bootKernel();
        $error = self::getContainer()->get('validator')->validate($user);
        $this->assertCount($nberror, $error);
    }
    public function testValideUsername(){
       $this->TestUser($this->user->setUsername('user-username'), 0);
        $this->TestUser($this->user->setUsername('User-username12'), 0);
        $this->TestUser($this->user->setUsername('username'), 0);
    }
    public function testErrorUsername(){
        $this->TestUser($this->user->setUsername('user'), 1);
        $this->TestUser($this->user->setUsername('user-username123'), 1);
    }

    public function testValideEmail(){
        $this->TestUser($this->user->setEmail('user@mail.fr'),0);
        $this->TestUser($this->user->setEmail('user@32mail.comf'),0);
    }
    public function testErrorEmail(){
        $this->TestUser($this->user->setEmail('user@mail.'),1);
        $this->TestUser($this->user->setEmail('user@'),1);
        $this->TestUser($this->user->setEmail('@mail.fr'),1);
        $this->TestUser($this->user->setEmail('@mail.f'),1);
        $this->TestUser($this->user->setEmail('user@32mail.32'),1);
    }
    public function testValidePassword(){
        $this->TestUser($this->user->setPassword('Username1%'), 0);
        $this->TestUser($this->user->setPassword('Username1'), 0);
    }
    public function testErrorPassword(){
        $this->TestUser($this->user->setPassword('Username%'), 1);
        $this->TestUser($this->user->setPassword('username1'), 1);
        $this->TestUser($this->user->setPassword('USERNAME1'), 1);
        $this->TestUser($this->user->setPassword('User'), 1);
        $this->TestUser($this->user->setPassword('User1'), 1);
    }
}