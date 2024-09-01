<?php

namespace App\Tests\Entity;

use App\Entity\Element;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ElementTest extends KernelTestCase
{
    private $atome;
    public function setUp(): void
    {
        $this->atome = new Element();
    }

    public function TestElement($propriete, $nberror){
        self::bootKernel();
        $error = self::getContainer()->get('validator')->validate($propriete);
        $this->assertCount($nberror, $error);
    }
    public function testValidateNom(){
        $this->TestElement($this->atome->setNom('bob'), 0);
    }
    public function testErrorNom(){
        $this->TestElement($this->atome->setNom('<bob'), 1);
    }

    public function testValidateElectron(){
        $this->TestElement($this->atome->setElectron('2|8|18|32|18|8|18|16|2'), 0);
    }
    public function testErrorElectron(){
        $this->TestElement($this->atome->setElectron('<2|8|18|32|18|8|18|16|2'), 1);
        $this->TestElement($this->atome->setElectron('2|8|18|32|18|8|18|16|2|18|8|18|16|218|8|18|16|2'), 1);
    }
    public function testValidateCas(){
        $this->TestElement($this->atome->setCas('14362-44-8 (élément), 7553-56-2 (diiode)'), 0);
    }
    public function testErrorCas(){
        $this->TestElement($this->atome->setCas('<14362-44-8 (élément), 7553-56-2 (diiode)'), 1);
        $this->TestElement($this->atome->setCas('14362-44-8 (élément), 7553-56-2 (diiode)14362-44-8 (élément), 7553-56-2 (diiode)'), 1);
    }
    public function testValidateMAtomic(){
        $this->TestElement($this->atome->setMasseAtomique('14'), 0);
    }
    public function testErrorMAtomic(){
        $this->TestElement($this->atome->setMasseAtomique('14A'), 1);
        $this->TestElement($this->atome->setMasseAtomique('14<'), 1);
    }

    public function testValidateConfElectro(){
        $this->TestElement($this->atome->setConfigurationElectronique('[Rn] 5f¹⁴ 6d¹⁰ 7s² 7p⁶ 5f¹⁴ 6d¹⁰ 7s² 7p⁶'), 0);
        $this->TestElement($this->atome->setConfigurationElectronique('[Rn] 5f¹⁴ 6d¹⁰ 7s² 7p⁶ 5f¹⁴ 6d¹⁰ 7s² 7p⁶ 5f¹⁴'), 0);
    }
    public function testErrorConfElectro(){
        $this->TestElement($this->atome->setConfigurationElectronique('<[Rn] 5f¹⁴ 6d¹⁰ 7s² 7p⁶'), 1);
        $this->TestElement($this->atome->setConfigurationElectronique('[Rn] 5f¹⁴ 6d¹⁰ 7s² 7p⁶ 5f¹⁴ 6d¹⁰ 7s² 7p⁶ 5f¹⁴ 6d¹⁰7'), 1);
    }
}