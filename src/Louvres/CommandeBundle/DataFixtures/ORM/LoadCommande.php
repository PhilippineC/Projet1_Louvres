<?php

namespace Louvres\CommandeBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\DBAL\Types\DateType;
use Louvres\CommandeBundle\Entity\Commande;

/*class LoadCommande implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $listCommandes = array(
            array(
                'DateVisite' => new \DateTime(),
                'TypeBillet' => 'journee',
                'nbBillet' => '5',
                'prixTotal' => '50',
                'mail' => 'blabla@blabla.com'),
            array(
                'DateVisite' => new \DateTime(),
                'TypeBillet' => 'demi_journee',
                'nbBillet' => '10',
                'prixTotal' => '90',
                'mail' => 'blabla@blabla.com'),
            array(
                'DateVisite' => new \DateTime(),
                'TypeBillet' => 'journee',
                'nbBillet' => '50',
                'prixTotal' => '500',
                'mail' => 'blabla@blabla.com'),
            array(
                'DateVisite' => new \DateTime(),
                'TypeBillet' => 'journee',
                'nbBillet' => '60',
                'prixTotal' => '610',
                'mail' => 'blabla@blabla.com')
        );

        foreach ($listCommandes as $listCommande) {
            $commande = new Commande();
            $commande->setDateVisite($listCommande['DateVisite']);
            $commande->setTypeBillet($listCommande['TypeBillet']);
            $commande->setNbBillet($listCommande['nbBillet']);
            $commande->setPrixTotal($listCommande['prixTotal']);
            $commande->setMail($listCommande['mail']);
            $manager->persist($commande);
        }
        $manager->flush();
    }
}*/