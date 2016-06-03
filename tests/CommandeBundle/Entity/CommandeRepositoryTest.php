<?php
namespace Tests\CommandeBundle\Entity;

use Louvres\CommandeBundle\Entity\Billet;
use Louvres\CommandeBundle\Entity\Commande;
use Doctrine\ORM\EntityRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class CommandeRepositoryTest extends KernelTestCase
{
    /**
    * @var \Doctrine\ORM\EntityManager
    */
    private $em;
    private $commande;

    /**
    * {@inheritDoc}
    */
/*    protected function setUp()
    {
        self::bootKernel();

        $this->em = static::$kernel->getContainer()
            ->get('doctrine')
            ->getManager();
    }*/

    public function testGetNbBillets()
    {/*
        $nbBillet = $this->em
            ->getRepository('LouvresCommandeBundle:Commande')
            ->getNbBillets(1);
        ;
        $this->assertEquals(4, $nbBillet);*/
    }

    public function testGetDatesComplet()
    {/*
        $datesComplet = $this->em
            ->getRepository('LouvresCommandeBundle:Commande')
            ->getDatesComplet();
        ;

        $this->assertEquals(0, count($datesComplet));*/
    }

    /**
    * {@inheritDoc}
    */
/*    protected function tearDown()
    {
        parent::tearDown();

        $this->em->close();
        $this->em = null; // avoid memory leaks
    }*/
}