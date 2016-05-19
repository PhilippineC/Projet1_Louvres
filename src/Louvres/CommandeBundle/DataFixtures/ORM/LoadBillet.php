<?php

namespace Louvres\CommandeBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Louvres\CommandeBundle\Entity\Billet;
use Louvres\CommandeBundle\Entity\Commande;

class LoadBillet implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $commande = new Commande();
        $commande->setDateVisite(new \DateTime());
        $commande->setTypeBillet('journee');
        $commande->setNbBillet(1500);
        $commande->setPrixTotal(50);
        $commande->setMail('blabla@blabla.com');
        $manager->persist($commande);

        // On crée 4 billets qu'on va lier à cette commande

        $listBillets = array(
            array(
                'typeTarif'  => 'senior',
                'nom' => 'Dupont',
                'prenom' => 'Alain',
                'pays' => 'France',
                'dateNaissance' => new \DateTime()),
            array(
                'typeTarif'  => 'normal',
                'nom' => 'Dupard',
                'prenom' => 'Georges',
                'pays' => 'France',
                'dateNaissance' => new \DateTime()),
            array(
                'typeTarif'  => 'enfant',
                'nom' => 'Joseph',
                'prenom' => 'Camille',
                'pays' => 'France',
                'dateNaissance' => new \DateTime()),
            array(
                'typeTarif'  => 'gratuit',
                'nom' => 'Joseph',
                'prenom' => 'Charlie',
                'pays' => 'France',
                'dateNaissance' => new \DateTime()),
        );

        foreach ($listBillets as $listBillet) {
            $billet = new Billet();
            $billet->setCommande($commande);
            $billet->setPays($listBillet['pays']);
            $billet->setTarif($listBillet['typeTarif']);
            $billet->setNom($listBillet['nom']);
            $billet->setPrenom($listBillet['prenom']);
            $billet->setDateNaissance($listBillet['dateNaissance']);
            $manager->persist($billet);
        }
        $manager->flush();
    }
}