<?php

namespace Tests\CommandeBundle\Entity;


use Louvres\CommandeBundle\Entity\Billet;
use Louvres\CommandeBundle\Entity\Commande;
use Symfony\Component\Validator\Context\ExecutionContextInterface;
use Symfony\Component\Validator\Validation;

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
        $this->billet1 = new Billet();
        $this->billet1->setNom('Dupont');
        $this->billet1->setDateNaissance(new \DateTime('01/01/1984'));
        $this->billet1->CalculTarif();

        $this->billet2 = new Billet();
        $this->billet2->setNom('Dupont');
        $this->billet2->setDateNaissance(new \DateTime('01/01/1985'));
        $this->billet2->CalculTarif();

        $this->billet3 = new Billet();
        $this->billet3->setNom('Dupont');
        $this->billet3->setDateNaissance(new \DateTime('01/01/2010'));
        $this->billet3->CalculTarif();

        $this->billet4 = new Billet();
        $this->billet4->setNom('Dupont');
        $this->billet4->setDateNaissance(new \DateTime('01/01/2011'));
        $this->billet4->CalculTarif();

        $this->billet5 = new Billet();
        $this->billet5->setNom('Dupond');
        $this->billet5->setDateNaissance(new \DateTime('01/01/1948'));
        $this->billet5->CalculTarif();
    }

    public function testVerifMemeNomAvecQuatresBillets()
    {
        $this->commande->addBillet($this->billet1);
        $this->commande->addBillet($this->billet2);
        $this->commande->addBillet($this->billet3);
        $this->commande->addBillet($this->billet4);
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

    public function testIsTypeBilletValideSiDateVisiteAujourdhuiEtApres14H()
    {
        $this->commande->addBillet($this->billet1);
        $this->commande->setTypeBillet('journee');
        $this->commande->setDateVisite(new \DateTime());
//Il faut forcer l'heure du jour à 15h
        $this->commande->setDateCom((new \DateTime())->setTime(15,0,0));
    /*    $validator = Validation::createValidatorBuilder()->getValidator();
        $violations = $validator->validate($this->commande);*/
        $message = 'Vous ne pouvez plus sélectionner un billet journée pour aujourd\'hui';
        $context = $this
             ->getMockBuilder('Symfony\Component\Validator\Context\ExecutionContextInterface')
             ->setMethods(array('buildViolation', 'atPath', 'addViolation)'))
             ->disableOriginalConstructor()
             ->getMock();
     /*  $context
            ->expects($this->once())
            ->method('buildViolation')
            ->with($message, array())
            ->will($this->returnValue($message));*/

     /*   $context
            ->expects($this->once())
            ->method('addViolation')
            ->with($message, array());
        $builder = $this
            ->getMockBuilder('Symfony\Component\Validator\Violation\ConstraintViolationBuilderInterface')
            ->disableOriginalConstructor()
            ->getMock();
        $builder
            ->expects($this->once())
            ->method('atPath')
            ->with('typeBillet');*/

        $violations = $this->commande->IsTypeBilletValide($context);

       $this->assertEquals(1, $violations->count());

    }


}