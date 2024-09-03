<?php

namespace App\Tests\Entity;


use App\Entity\ApiDocumentation;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ApiDocumentationTest extends KernelTestCase
{
    private $ApiDoc;
    public function setUp(): void
    {
        $this->ApiDoc = new ApiDocumentation();
    }
    public function TestApiDocumentation($propriete, $nberror, $message){
        self::bootKernel();
        $error = self::getContainer()->get('validator')->validate($propriete);
        $this->assertCount($nberror, $error, $message);
    }
    public function testValidateTitle(){
        $this->TestApiDocumentation($this->ApiDoc->setTitle('Titre'), 0, 'Error testValidateTitle');
        $this->TestApiDocumentation($this->ApiDoc->setTitle('Titre Exemple 123'), 0, 'Error testValidateTitle');
        $this->TestApiDocumentation($this->ApiDoc->setTitle("Titre d'été"), 0, 'Error testValidateTitle');
    }
    public function testErrorTitle(){
        $this->TestApiDocumentation($this->ApiDoc->setTitle('<Titre'), 1, 'Error testValidateTitle');
    }




}