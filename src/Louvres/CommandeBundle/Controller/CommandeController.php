<?php

namespace Louvres\CommandeBundle\Controller;

use Louvres\CommandeBundle\Entity\Billet;
use Louvres\CommandeBundle\Entity\Commande;
use Louvres\CommandeBundle\Entity\Confirmation;
use Louvres\CommandeBundle\Form\BilletType;
use Louvres\CommandeBundle\Form\CommandeType;
use Louvres\CommandeBundle\Form\ConfirmationType;
use Louvres\CommandeBundle\MailBillets\BilletsPDF;
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

            return $this->redirect($this->generateUrl('Louvres_commande_confirmation',  array(
                'code' => $commande->getCode()
                )));
        }

        return $this->render('LouvresCommandeBundle:Commande:index.html.twig', array(
            'formCommande' =>$formCommande->createView(),
            'Dates_complet' => $datesComplet_JSON
        ));
    }

    public function confirmationAction(Commande $commande, Request $request)
    {
        $confirmation = new Confirmation();
        $commande->setConfirmation($confirmation);
        $form = $this->createForm(ConfirmationType::class, $confirmation);

        // On vérifie que les valeurs entrées sont correctes
        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($confirmation);
            $em->flush();

            if ($commande->getConfirmation()->getMoyenPaiement() == 'paypal') {
                return $this->redirect($this->generateUrl('Louvres_commande_paiement_paypal', array(
                    'code' => $commande->getCode()
                )));
            } elseif ($commande->getConfirmation()->getMoyenPaiement() == 'stripe') {
                return $this->redirect($this->generateUrl('Louvres_commande_paiement_stripe', array(
                    'code' => $commande->getCode()
                )));
            }
        }

        return $this->render('LouvresCommandeBundle:Commande:confirmation.html.twig', array(
            'form' =>$form->createView(),
            'commande' =>$commande
        ));
    }
}
