<?php

namespace Louvres\CommandeBundle\EventListener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use Louvres\CommandeBundle\Entity\Commande;
use Louvres\CommandeBundle\Entity\Billet;


class ParamCommande {

    public function postPersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        if (!$entity instanceof Billet) {
            return;
        }
        /* Calcul du nombre de billets de la commande */
        $em = $args->getEntityManager();
        $nbBillets = $em
            ->getRepository('LouvresCommandeBundle:Commande')
            ->getNbBillets($entity->getCommande()->getId());
        $entity->getCommande()->setNbBillet($nbBillets);
        $entity->getCommande()->calculPrixTotal();
        $em->flush();
    }
}