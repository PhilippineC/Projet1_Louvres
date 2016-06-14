<?php

namespace Tests\CommandeBundle\Entity;


use Louvres\CommandeBundle\Entity\Billet;
use Louvres\CommandeBundle\Entity\Commande;
use Symfony\Component\Validator\Context\ExecutionContextInterface;
use Symfony\Component\Validator\Context\ExecutionContext;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Tests\Constraints\AbstractConstraintValidatorTest;
use Symfony\Component\Validator\Violation\ConstraintViolationBuilder;

class CommandeTest extends \PHPUnit_Framework_TestCase
{
    private $commande;
    private $billet1;
    private $billet2;
    private $billet3;
    private $billet4;
    private $billet5;
    private $hour; // Forcer l'heure du jour à 15h pour tester le type de billet

    public function setUp()
    {
        $this->commande = new Commande();
        $this->hour = 15;

        $this->billet1 = $this
            ->getMockBuilder(Billet::class)
            ->setMethods(null)
            ->getMock();
        $this->billet2 = $this
            ->getMockBuilder(Billet::class)
            ->setMethods(null)
            ->getMock();
        $this->billet3 = $this
            ->getMockBuilder(Billet::class)
            ->setMethods(null)
            ->getMock();
        $this->billet4 = $this
            ->getMockBuilder(Billet::class)
            ->setMethods(null)
            ->getMock();
        $this->billet5 = $this
            ->getMockBuilder(Billet::class)
            ->setMethods(null)
            ->getMock();
        $this->billet6 = $this
            ->getMockBuilder(Billet::class)
            ->setMethods(null)
            ->getMock();

        $this->billet1->setNom('Dupont');
        $this->billet1->setDateNaissance(new \DateTime('01/01/1984'));
        $this->billet1->CalculTarif();

        $this->billet2->setNom('Dupont');
        $this->billet2->setDateNaissance(new \DateTime('01/01/1985'));
        $this->billet2->CalculTarif();

        $this->billet3->setNom('Dupont');
        $this->billet3->setDateNaissance(new \DateTime('01/01/2010'));
        $this->billet3->CalculTarif();

        $this->billet4->setNom('Dupont');
        $this->billet4->setDateNaissance(new \DateTime('01/01/2011'));
        $this->billet4->CalculTarif();

        $this->billet5->setNom('Dupond');
        $this->billet5->setDateNaissance(new \DateTime('01/01/1948'));
        $this->billet5->CalculTarif();

        $this->billet6->setNom('Dupond');
        $this->billet6->setDateNaissance(new \DateTime('01/03/2016'));
        $this->billet6->CalculTarif();
    }

    public function testVerifMemeNomAvecQuatresBillets()
    {
        $this->commande->addBillet($this->billet1);
        $this->commande->addBillet($this->billet2);
        $this->commande->addBillet($this->billet3);
        $this->commande->addBillet($this->billet4);
        $this->commande->addBillet($this->billet5);
        $this->commande->removeBillet($this->billet5);
        $this->commande->calculPrixTotal();
        $this->assertEquals(4, $this->billet1->getMemeNom());
    }

    public function testVerifMemeNomAvecCinqBillets()
    {
        $this->commande->addBillet($this->billet1);
        $this->commande->addBillet($this->billet2);
        $this->commande->addBillet($this->billet3);
        $this->commande->addBillet($this->billet4);
        $this->commande->addBillet($this->billet5);
        $this->commande->calculPrixTotal();
        $this->assertEquals(4, $this->billet2->getMemeNom());
    }

    public function testTarifFamilleTrue()
    {
        $this->commande->addBillet($this->billet1);
        $this->commande->addBillet($this->billet2);
        $this->commande->addBillet($this->billet3);
        $this->commande->addBillet($this->billet4);
        $this->commande->calculPrixTotal();
        $this->assertTrue($this->billet3->getFamille());
    }

    public function testTarifFamilleFalse()
    {
        $this->commande->addBillet($this->billet1);
        $this->commande->addBillet($this->billet2);
        $this->commande->addBillet($this->billet3);
        $this->commande->addBillet($this->billet5);
        $this->commande->calculPrixTotal();
        $this->assertFalse($this->billet3->getFamille());
    }

    public function testCalculPrixTotalUnBilletReduit()
    {
        $this->billet1->setReduit(true);
        $this->commande->addBillet($this->billet1);
        $this->commande->calculPrixTotal();
         $this->assertEquals(Commande::TARIF_REDUIT, $this->commande->getPrixTotal());

    }

    public function testCalculPrixTotalUnBilletReduitetUnBilletNormal()
    {
        $this->billet1->setReduit(true);
        $this->commande->addBillet($this->billet1);
        $this->commande->addBillet($this->billet2);
        $this->commande->calculPrixTotal();
        $this->assertEquals(Commande::TARIF_REDUIT + Commande::TARIF_NORMAL, $this->commande->getPrixTotal());

    }

    public function testCalculPrixTotalUnBilletSeniorEtUnBilletEnfant()
    {
        $this->commande->addBillet($this->billet3);
        $this->commande->addBillet($this->billet5);
        $this->commande->calculPrixTotal();
        $this->assertEquals(Commande::TARIF_SENIOR + Commande::TARIF_ENF, $this->commande->getPrixTotal());

    }

    public function testCalculPrixTotalUnBilletFamille()
    {
        $this->commande->addBillet($this->billet1);
        $this->commande->addBillet($this->billet2);
        $this->commande->addBillet($this->billet3);
        $this->commande->addBillet($this->billet4);
        $this->commande->calculPrixTotal();
        $this->assertEquals(Commande::TARIF_FAMILLE, $this->commande->getPrixTotal());

    }

    public function testCalculPrixTotalUnBilletFamilleMemeSiReduitCoche()
    {
        $this->billet1->setReduit(true);
        $this->commande->addBillet($this->billet1);
        $this->commande->addBillet($this->billet2);
        $this->commande->addBillet($this->billet3);
        $this->commande->addBillet($this->billet4);
        $this->commande->calculPrixTotal();
        $this->assertEquals(Commande::TARIF_FAMILLE, $this->commande->getPrixTotal());

    }

    public function testCalculPrixTotalUnBilletFamilleEtUnBilletSenior()
    {
        $this->commande->addBillet($this->billet1);
        $this->commande->addBillet($this->billet2);
        $this->commande->addBillet($this->billet3);
        $this->commande->addBillet($this->billet4);
        $this->commande->addBillet($this->billet5);
        $this->commande->calculPrixTotal();
        $this->assertEquals(Commande::TARIF_FAMILLE + Commande::TARIF_SENIOR, $this->commande->getPrixTotal());
    }

    public function testCalculPrixTotalUnBilletNormalEtUnBilletGratuit()
    {
        $this->commande->addBillet($this->billet1);
        $this->commande->addBillet($this->billet6);
        $this->commande->calculPrixTotal();
        $this->assertEquals(Commande::TARIF_NORMAL, $this->commande->getPrixTotal());
    }

/*    public function testIsTypeBilletValideSiDateVisiteAujourdhuiEtApres14H()
    {
        $this->commande->addBillet($this->billet1);
        $this->commande->setTypeBillet('journee');
        $this->commande->setDateVisite(new \DateTime());
//Il faut forcer l'heure du jour à 15h
        $this->commande->setDateCom((new \DateTime())->setTime(15,0,0));
        $validator = Validation::createValidatorBuilder()->getValidator();
        $violations = $validator->validate($this->commande);

        $message = 'Vous ne pouvez plus sélectionner un billet journée pour aujourd\'hui';
        $context = $this
            ->getMockBuilder(ExecutionContext::class)
            ->disableOriginalConstructor()
            ->getMock();
        $context2 = $this
            ->getMockBuilder(ExecutionContext::class)
            ->disableOriginalConstructor()
            ->getMock();
        $constraint = $this
            ->getMockBuilder(ConstraintViolationBuilder::class)
            ->disableOriginalConstructor()
            ->getMock();

        $context
            ->method('buildViolation')
            ->with($message)
             ->willReturn($constraint);
        $constraint
            ->method('atPath')
            ->with('typeBillet')
            ->willReturn($context2);
        $context2
            ->method('addViolation')
             ->willReturn($message);

        $violations = $this->commande->IsTypeBilletValide($context);

       $this->assertEquals(1, $violations->count());
    }*/
}