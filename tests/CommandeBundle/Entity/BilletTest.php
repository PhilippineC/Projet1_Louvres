<?php

namespace Tests\CommandeBundle\Entity;


use Louvres\CommandeBundle\Entity\Billet;

class BilletTest extends \PHPUnit_Framework_TestCase
{
    private $billet;
    public function setUp()
    {
        $this->billet = new Billet();
    }

    public function testCalculTarifGratuit()
    {
        $this->billet->setDateNaissance(new \DateTime('01/01/2014'));
        $this->billet->calculTarif();
        $this->assertEquals(Billet::BILLET_GRATUIT, $this->billet->getTarif());
    }

    public function testCalculTarifEnfantDateAnniversaire()
    {
        $this->billet->setDateNaissance((new \DateTime())->sub(new \DateInterval('P4Y')));
        $this->billet->calculTarif();
        $this->assertEquals(Billet::BILLET_ENF, $this->billet->getTarif());
    }

    public function testCalculTarifEnfant()
    {
        $this->billet->setDateNaissance(new \DateTime('01/01/2010'));
        $this->billet->calculTarif();
        $this->assertEquals(Billet::BILLET_ENF, $this->billet->getTarif());
    }

    public function testCalculTarifNormal()
    {
        $this->billet->setDateNaissance(new \DateTime('01/01/1987'));
        $this->billet->calculTarif();
        $this->assertEquals(Billet::BILLET_NORM, $this->billet->getTarif());
    }

    public function testCalculTarifSenior()
    {
        $this->billet->setDateNaissance(new \DateTime('01/01/1926'));
        $this->billet->calculTarif();
        $this->assertEquals(Billet::BILLET_SENIOR, $this->billet->getTarif());
    }

    public function testCalculTarifNotFound()
    {
        $this->billet->setDateNaissance(new \DateTime('01/01/2026'));
        $this->billet->calculTarif();
        $this->assertEquals(Billet::NOT_FOUND, $this->billet->getTarif());
    }
}