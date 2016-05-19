<?php

namespace Louvres\CommandeBundle\Controller;

use Louvres\CommandeBundle\Entity\Billet;
use Louvres\CommandeBundle\Entity\Commande;
use Louvres\CommandeBundle\Form\BilletType;
use Louvres\CommandeBundle\Form\CommandeType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class CommandeController extends Controller
{
    /**
     * @Route("/")
     */
    public function homeAction(Request $request)
    {
    /*    $billets = new Billet();*/
         $commande = new Commande();
         $commande->setDateCom(new \DateTime());
    /*    $commande->addBillet($billet1);*/
        $formCommande = $this->createForm(CommandeType::class, $commande);

        // On vérifie que les valeurs entrées sont correctes
        if ($formCommande->handleRequest($request)->isValid()) {
            var_dump($commande);
            $em = $this->getDoctrine()->getManager();
            $em->persist($commande);
            $em->flush();

            // On redirige vers la page de visualisation de l'annonce nouvellement créée
        /*    return $this->redirect($this->generateUrl('Louvres_commande_paiement'));*/
        }

        return $this->render('LouvresCommandeBundle:Commande:index.html.twig', array(
            'formCommande' =>$formCommande->createView()
        ));
    }


    public function paiementAction()
    {
        return $this->render('LouvresCommandeBundle:Commande:paiement.html.twig');
    }
}
