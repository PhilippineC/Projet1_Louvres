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
        for ($i = 0; $i<count($datesComplet) ;$i++ ) {
            $datesComplet[$i] = $datesComplet[$i]['dateVisite']->format('m-d-Y');
        }
        $datesComplet_JSON = json_encode($datesComplet);


         $commande = new Commande();
         $formCommande = $this->createForm(CommandeType::class, $commande);

        // On vérifie que les valeurs entrées sont correctes
        if ($formCommande->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($commande);
            $em->flush();

            return $this->redirect($this->generateUrl('Louvres_commande_paiement'));
        }

        return $this->render('LouvresCommandeBundle:Commande:index.html.twig', array(
            'formCommande' =>$formCommande->createView(),
            'Dates_complet' => $datesComplet_JSON
        ));
    }


    public function paiementAction()
    {
        return $this->render('LouvresCommandeBundle:Commande:paiement.html.twig');
    }
}
