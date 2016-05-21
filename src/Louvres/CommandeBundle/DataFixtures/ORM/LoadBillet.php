<?php

namespace Louvres\CommandeBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Louvres\CommandeBundle\Entity\Billet;
use Louvres\CommandeBundle\Entity\Commande;
use Louvres\CommandeBundle\Entity\Email;

class LoadBillet implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $commande = new Commande();
        $commande->setDateVisite(new \DateTime('2016-07-11'));
        $commande->setTypeBillet('journee');
        $mail = new Email();
        $mail->setMail('blabla@blabla.com');
        $commande->setEmail($mail);
        $manager->persist($mail);
        $manager->persist($commande);

        // On crée 4 billets qu'on va lier à cette commande

        $listBillets = array(
            array(
                'nom' => 'Dupont',
                'prenom' => 'Alain',
                'pays' => 'France',
                'dateNaissance' => new \DateTime()),
            array(
                'nom' => 'Dupard',
                'prenom' => 'Georges',
                'pays' => 'France',
                'dateNaissance' => new \DateTime()),
            array(
                'nom' => 'Joseph',
                'prenom' => 'Camille',
                'pays' => 'France',
                'dateNaissance' => new \DateTime()),
            array(
                'nom' => 'Joseph',
                'prenom' => 'Charlie',
                'pays' => 'France',
                'dateNaissance' => new \DateTime()),
        );

        foreach ($listBillets as $listBillet) {
            $billet = new Billet();
            $billet->setCommande($commande);
            $billet->setPays($listBillet['pays']);
            $billet->setNom($listBillet['nom']);
            $billet->setPrenom($listBillet['prenom']);
            $billet->setDateNaissance($listBillet['dateNaissance']);
            $manager->persist($billet);
        }
        $manager->flush();



        /* Deuxième commande*/

        $commande2 = new Commande();
        $commande2->setDateVisite(new \DateTime('2016-07-03'));
        $commande2->setTypeBillet('journee');
        $mail2 = new Email();
        $mail2->setMail('blabla2@blabla.com');
        $commande2->setEmail($mail2);
        $manager->persist($mail2);
        $manager->persist($commande2);

        // On crée 4 billets qu'on va lier à cette commande

        $listBillets = array(
            array(
                'nom' => 'Dupont',
                'prenom' => 'Alain',
                'pays' => 'France',
                'dateNaissance' => new \DateTime()),
            array(
                'nom' => 'Dupard',
                'prenom' => 'Georges',
                'pays' => 'France',
                'dateNaissance' => new \DateTime()),
            array(
                'nom' => 'Joseph',
                'prenom' => 'Camille',
                'pays' => 'France',
                'dateNaissance' => new \DateTime()),
            array(
                'nom' => 'Joseph',
                'prenom' => 'Charlie',
                'pays' => 'France',
                'dateNaissance' => new \DateTime()),
        );

        foreach ($listBillets as $listBillet) {
            $billet = new Billet();
            $billet->setCommande($commande2);
            $billet->setPays($listBillet['pays']);
            $billet->setNom($listBillet['nom']);
            $billet->setPrenom($listBillet['prenom']);
            $billet->setDateNaissance($listBillet['dateNaissance']);
            $manager->persist($billet);
        }
        $manager->flush();
    }
}