<?php

namespace Louvres\CommandeBundle\Controller;

use Louvres\CommandeBundle\Entity\Commande;
use Payum\Core\Request\GetHumanStatus;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Louvres\CommandeBundle\Entity\PaymentDetails;

class PaymentController extends Controller
{
    public function preparePaypalExpressCheckoutPaymentAction(Commande $commande)
    {
        $gatewayName = 'billets_paypal';
        $storage = $this->get('payum')->getStorage('Louvres\CommandeBundle\Entity\PaymentDetails');
        $details = $storage->create();

        $details['PAYMENTREQUEST_0_CURRENCYCODE'] = 'EUR';
        $details['PAYMENTREQUEST_0_AMT'] = $commande->getPrixTotal();
        $storage->update($details);

        $captureToken = $this->get('payum')->getTokenFactory()->createCaptureToken(
            $gatewayName,
            $details,
            'Louvres_commande_paiement_done' // the route to redirect after capture;
        );

        return $this->redirect($captureToken->getTargetUrl());
    }

    public function prepareStripePaymentAction(Commande $commande)
    {
        $gatewayName = 'billets_stripe';
        $storage = $this->get('payum')->getStorage('Louvres\CommandeBundle\Entity\Payment');
        $payment = $storage->create();

        $payment->setNumber(uniqid());
        $payment->setCurrencyCode('EUR');
        $payment->setTotalAmount($commande->getPrixTotal()*100); //
        $payment->setClientId($commande->getId());
        $payment->setClientEmail($commande->getConfirmation()->getMail());

        $storage->update($payment);
        $em = $this->getDoctrine()->getManager();
        $em->persist($payment);
        $em->flush($payment);

        $captureToken = $this->get('payum')->getTokenFactory()->createCaptureToken($gatewayName, $payment, 'Louvres_commande_paiement_done');

        return $this->redirect($captureToken->getTargetUrl());
    }

    public function captureDoneAction(Request $request)
    {
        $token = $this->get('payum')->getHttpRequestVerifier()->verify($request);

        $identity = $token->getDetails();
        $model = $this->get('payum')->getStorage($identity->getClass())->find($identity);

        $gateway = $this->get('payum')->getGateway($token->getGatewayName());

        // you can invalidate the token. The url could not be requested any more.
        // $this->get('payum')->getHttpRequestVerifier()->invalidate($token);

        // Once you have token you can get the model from the storage directly.
        //$identity = $token->getDetails();
        //$details = $payum->getStorage($identity->getClass())->find($identity);

        // or Payum can fetch the model for you while executing a request (Preferred).
        $gateway->execute($status = new GetHumanStatus($token));
        $details = $status->getFirstModel();

        if ($status->isCaptured()) {
            // Création du pdf + envoi par mail
            return $this->render('LouvresCommandeBundle:Commande:paiement_done.html.twig');
        }
        else {
            $this->get('session')->getFlashBag()->add('info', 'Le paiement n\'a pas abouti. Veuillez réessayer.' );
            return $this->redirectToRoute('Louvres_commande_confirmation', array(
                'code' => $commande->getCode()
            ));
        }

    /*    return new JsonResponse(array(
            'status' => $status->getValue(),
            'details' => iterator_to_array($details),
        ));*/
    }
}