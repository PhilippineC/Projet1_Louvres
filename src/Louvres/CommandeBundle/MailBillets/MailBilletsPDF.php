<?php

namespace Louvres\CommandeBundle\MailBillets;

use Louvres\CommandeBundle\Entity\Commande;
use Knp\Bundle\SnappyBundle\Snappy\LoggableGenerator;
use Symfony\Component\Templating\EngineInterface;
use \Symfony\Bundle\SwiftmailerBundle;
use \Swift_Attachment;


class MailBilletsPDF  {

    private $mailer;
    private $message;
    private $pdf;
    private $template;
    private $commande;
    CONST PATH_PDF = __DIR__.'/../../../../web/EnvoiPDF/';

    public function __construct(\Swift_Mailer $mailer, LoggableGenerator $pdf, EngineInterface $template)
    {
        $this->mailer = $mailer;
        $this->pdf = $pdf;
        $this->template = $template;
    }

    private function generatePDF()
    {
        $this->pdf->generateFromHtml(
            $this->template->render(
                'LouvresCommandeBundle:Commande:Billets.html.twig',
                array(
                    'commande'  => $this->commande
                )
            ),
            self::PATH_PDF.$this->commande->getCode() .'.pdf'
        );
    }

    public function sendMail(Commande $commande) {
        $this->commande = $commande;
        $this->generatePDF();

        $this->message = \Swift_Message::newInstance();
        $this->message
            ->setSubject('Votre réservation au Musée du Louvre')
            ->setFrom(array('louvre@louvre.com' => 'Musée du Louvre'))
            ->setTo(array($this->commande->getConfirmation()->getMail()))
            ->setBody(
                 $this->template->render(
                     'LouvresCommandeBundle:Commande:email.txt.twig',
                     array('commande' => $commande)
                 ),
                'text/html'
            )
            ->attach(Swift_Attachment::fromPath(self::PATH_PDF.$this->commande->getCode() .'.pdf'));
        $this->mailer->send($this->message);
    }
}