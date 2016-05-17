<?php

namespace Louvres\CommandeBundle\Controller;

use Louvres\CommandeBundle\Entity\Billet;
use Louvres\CommandeBundle\Entity\Commande;
use Louvres\CommandeBundle\Form\BilletType;
use Louvres\CommandeBundle\Form\CommandeType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class CommandeController extends Controller
{
    /**
     * @Route("/")
     */
    public function homeAction()
    {
        $billet = new Billet();
        $formBillet = $this->createForm(BilletType::class, $billet);
        $commande = new Commande();
        $formCommande = $this->createForm(CommandeType::class, $commande);
        return $this->render('LouvresCommandeBundle:Commande:index.html.twig', array(
            'formBillet' =>$formBillet->createView(),
            'formCommande' =>$formCommande->createView(),
        ));
    }
}
