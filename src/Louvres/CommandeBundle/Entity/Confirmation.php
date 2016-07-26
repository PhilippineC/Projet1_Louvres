<?php

namespace Louvres\CommandeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Confirmation
 *
 * @ORM\Table(name="confirmation")
 * @ORM\Entity(repositoryClass="Louvres\CommandeBundle\Repository\ConfirmationRepository")
 */
class Confirmation
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @Assert\Email(
     *     message = "Merci de saisir une adresse email valide",
     *     checkMX = true
     * )
     * @ORM\Column(name="mail", type="string", length=255)
     */
    private $mail;

    /**
     * @var string
     * @ORM\Column(name="moyenPaiement", type="string", length=255)
     */
    private $moyenPaiement;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set mail
     *
     * @param string $mail
     *
     * @return Confirmation
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set moyenPaiement
     *
     * @param string $moyenPaiement
     *
     * @return Confirmation
     */
    public function setMoyenPaiement($moyenPaiement)
    {
        $this->moyenPaiement = $moyenPaiement;

        return $this;
    }

    /**
     * Get moyenPaiement
     *
     * @return string
     */
    public function getMoyenPaiement()
    {
        return $this->moyenPaiement;
    }
}
