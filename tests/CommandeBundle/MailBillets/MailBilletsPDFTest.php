<?php
namespace Tests\CommandeBundle\MailBillets;

use Louvres\CommandeBundle\MailBillets\MailBilletsPDF;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MailBilletsPDFTest extends WebTestCase
{
    public function testSendMail()
    {
    /*    $client = static::createClient();

        // Enable the profiler for the next request (it does nothing if the profiler is not available)
        $client->enableProfiler();

        $crawler = $client->request('POST', 'Louvres_commande_paiement_done');

        $mailCollector = $client->getProfile()->getCollector('swiftmailer');

        // Check that an email was sent
        $this->assertEquals(1, $mailCollector->getMessageCount());

        $collectedMessages = $mailCollector->getMessages();
        $message = $collectedMessages[0];

        // Asserting email data
        $this->assertInstanceOf('Swift_Message', $message);
        $this->assertEquals('Votre réservation au Musée du Louvre', $message->getSubject());
        $this->assertEquals(array('louvre@louvre.com' => 'Musée du Louvre'), key($message->getFrom()));
        $this->assertEquals('recipient@example.com', key($message->getTo()));
    */
    }
}