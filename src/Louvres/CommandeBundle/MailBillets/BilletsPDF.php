<?php

namespace Louvres\CommandeBundle\MailBillets;

use Louvres\CommandeBundle\Entity\Commande;

class BilletsPDF {

    public function generatePDF(Commande $commande)
    {
        $this->get('knp_snappy.pdf')->generate('http://www.google.fr', __DIR__.'/../../../../web/EnvoiPDF/file.pdf');
    /*    $this->snappy->generateFromHtml(
            $this->renderView(
                'LouvresCommandeBundle:Commande:Billets.html.twig',
                array(
                    'commande'  => $commande
                )
            ),
            __DIR__.'/../../../../web/EnvoiPDF/file.pdf'
        );*/
    }
}