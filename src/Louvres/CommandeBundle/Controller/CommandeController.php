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
    /*  Aller chercher les dates où le musée est complet   */
        $datesComplet = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('LouvresCommandeBundle:Commande')
            ->getDatesComplet();
        var_dump($datesComplet);

    /*    $billets = new Billet();*/
         $commande = new Commande();
         $commande->setDateCom(new \DateTime());
    /*    $commande->addBillet($billet1);*/
        $formCommande = $this->createForm(CommandeType::class, $commande);

        // On vérifie que les valeurs entrées sont correctes
        if ($formCommande->handleRequest($request)->isValid()) {
         /*   var_dump($commande);*/
            $em = $this->getDoctrine()->getManager();
            $em->persist($commande);
            $em->flush();

            /* Mettre ici les variables de entités à remplir ? */
            $nbBillets = $this
                ->getDoctrine()
                ->getManager()
                ->getRepository('LouvresCommandeBundle:Commande')
                ->getnbBillets($commande->getId());
            var_dump($nbBillets);
            $commande->setNbBillet($nbBillets);
            // On redirige vers la page de visualisation de l'annonce nouvellement créée
            return $this->redirect($this->generateUrl('Louvres_commande_paiement'));
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
