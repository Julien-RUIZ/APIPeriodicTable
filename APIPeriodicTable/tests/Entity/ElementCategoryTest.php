<?php

namespace App\Tests\Entity;

use App\Entity\ElementCategory;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * vendor/bin/phpunit tests/Entity/ElementCategoryTest.php
 */
class ElementCategoryTest extends KernelTestCase
{
    private $elementCategory;
    public function setUp(): void
    {
        $this->elementCategory = new ElementCategory();
    }

    public function TestElementCategory($propriete, $nberror, $message){
        self::bootKernel();
        $error = self::getContainer()->get('validator')->validate($propriete);
        $this->assertCount($nberror, $error, $message);
    }

    public function testValidateName(){
        $this->TestElementCategory($this->elementCategory->setName('Métal de transition'), 0, 'Error testValidateName');
    }
    public function testErrorName(){
        $this->TestElementCategory($this->elementCategory->setName('%µmetal<<<'), 1, 'Error testErrorName');
    }
    public function testValidateSlug(){
        $this->TestElementCategory($this->elementCategory->setSlug('Métal de transition'), 0, 'Error testValidateSlug');
    }
    public function testErrorSlug(){
        $this->TestElementCategory($this->elementCategory->setName('%µmetal<<<'), 1, 'Error testErrorSlug');
    }

}