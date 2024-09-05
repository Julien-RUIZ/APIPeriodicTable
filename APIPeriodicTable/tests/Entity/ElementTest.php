<?php

namespace App\Tests\Entity;

use App\Entity\Element;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * vendor/bin/phpunit tests/Entity/ElementAdminTest.php
 */
class ElementTest extends KernelTestCase
{
    private $element;
    public function setUp(): void
    {
        $this->element = new Element();
    }

    public function TestElement($propriete, $nberror, $message){
        self::bootKernel();
        $error = self::getContainer()->get('validator')->validate($propriete);
        $this->assertCount($nberror, $error, $message);
    }
    public function testValidateNom(){
        $this->TestElement($this->element->setNom('bob'), 0, 'Error testValidateNom');
        $this->TestElement($this->element->setNom("L'Hyper texte"), 0, 'Error testValidateNom');
    }
    public function testErrorNom(){
        $this->TestElement($this->element->setNom('<bob'), 1, 'Error testErrorNom');
    }

    public function testValidateElectron(){
        $this->TestElement($this->element->setElectron('2|8|18|32|18|8|18|16|2'), 0, 'Error testValidateElectron');
    }
    public function testErrorElectron(){
        $this->TestElement($this->element->setElectron('<2|8|18|32|18|8|18|16|2'), 1, 'Error testErrorElectron');
        $this->TestElement($this->element->setElectron('2|8|18|32|18|8|18|16|2|18|8|18|16|218|8|18|16|2'), 1, 'Error testErrorElectron');
    }
    public function testValidateCas(){
        $this->TestElement($this->element->setCas('14362-44-8 (élément), 7553-56-2 (diiode)'), 0, 'Error testValidateCas');
    }
    public function testErrorCas(){
        $this->TestElement($this->element->setCas('<14362-44-8 (élément), 7553-56-2 (diiode)'), 1, 'Error testErrorCas');
        $this->TestElement($this->element->setCas('14362-44-8 (élément), 7553-56-2 (diiode)14362-44-8 (élément), 7553-56-2 (diiode)'), 1, 'Error testErrorCas');
    }
    public function testValidateMassAtomic(){
        $this->TestElement($this->element->setMasseAtomique('14'), 0, 'Error testValidateMassAtomic');
        $this->TestElement($this->element->setMasseAtomique('14.2'), 0, 'Error testValidateMassAtomic');

    }
    public function testErrorMassAtomic(){
        $this->TestElement($this->element->setMasseAtomique('14<'), 1, 'Error testErrorMassAtomic');
        $this->TestElement($this->element->setMasseAtomique('14A'), 1, 'Error testValidateMassAtomic');
        $this->TestElement($this->element->setMasseAtomique('14,2'), 1, 'Error testValidateMassAtomic');
        $this->TestElement($this->element->setMasseAtomique('-14.2'), 1, 'Error testValidateMassAtomic');
    }

    public function testValidateRayonAtomic(){
        $this->TestElement($this->element->setRayonAtomique('100 pm (88 pm)'), 0, 'Error testValidateRayonAtomic');
    }
    public function testErrorRayonAtomic(){
        $this->TestElement($this->element->setRayonAtomique('85<'), 1, 'Error testErrorRayonAtomic');
        $this->TestElement($this->element->setRayonAtomique('-100 pm (88 pm)'), 1, 'Error testErrorRayonAtomic');
    }

    public function testValidateConfElectro(){
        $this->TestElement($this->element->setConfigurationElectronique('[Rn] 5f¹⁴ 6d¹⁰ 7s² 7p⁶ 5f¹⁴ 6d¹⁰ 7s² 7p⁶'), 0, 'Error testValidateConfElectro');
        $this->TestElement($this->element->setConfigurationElectronique('[Rn] 5f¹⁴ 6d¹⁰ 7s² 7p⁶ 5f¹⁴ 6d¹⁰ 7s² 7p⁶ 5f¹⁴'), 0, 'Error testValidateConfElectro');
    }
    public function testValidatePointDEbullition(){
        $this->TestElement($this->element->setPointDEbullition('11 °C'), 0, 'Error testValidatePointDEbullition' );
    }
    public function testErrorPointDEbullition(){
        $this->TestElement($this->element->setPointDEbullition('<11 °C'), 1, 'Error testErrorPointDEbullition' );
    }

    public function testValidateEtatOxydation(){
        $this->TestElement($this->element->setEtatOxydation('-1, +1, +3, +5, +7'), 0, 'Error testValidateEtatOxydation' );
    }
    public function testErrorEtatOxydation(){
        $this->TestElement($this->element->setEtatOxydation('<-1, +1, +3, +5, +7'), 1, 'Error testErrorEtatOxydation' );
    }

    public function testValidatePointDeFusion(){
        $this->TestElement($this->element->setPointDeFusion('-1 541 °C'), 0, 'Error testValidatePointDeFusion' );
        $this->TestElement($this->element->setPointDeFusion('-1,2 °C'), 0, 'Error testValidatePointDeFusion' );
        $this->TestElement($this->element->setPointDeFusion('1,2 °C'), 0, 'Error testValidatePointDeFusion' );
        $this->TestElement($this->element->setPointDeFusion('1 °C'), 0, 'Error testValidatePointDeFusion' );
        $this->TestElement($this->element->setPointDeFusion('-1 541°C'), 0, 'Error testValidatePointDeFusion' );
    }
}