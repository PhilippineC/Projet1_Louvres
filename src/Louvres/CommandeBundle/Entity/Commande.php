<?php

namespace Louvres\CommandeBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Commande
 *
 * @ORM\Table(name="commande")
 * @ORM\Entity(repositoryClass="Louvres\CommandeBundle\Repository\CommandeRepository")
 */
class Commande
{
    /**
     * @ORM\OneToMany(targetEntity="Louvres\CommandeBundle\Entity\Billet", mappedBy="commande", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $billets;
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *@Assert\DateTime()
     * @ORM\Column(name="date_com", type="datetime")
     */
    private $dateCom;

    /**
     * @var \DateTime
     *@Assert\Date()
     * @ORM\Column(name="date_visite", type="date")
     */
    private $dateVisite;

    /**
     * @var string
     *
     * @ORM\Column(name="type_billet", type="string", length=255)
     */
    private $typeBillet;

    /**
     * @var int
     * @Assert\Range(min=1, max=7)
     * @ORM\Column(name="nb_billet", type="integer")
     */
    private $nbBillet = 1;

    /**
     * @var int
     * @ORM\Column(name="prix_total", type="integer")
     */
    private $prixTotal;

    /**
     * @var string
     * @Assert\Email()
     * @ORM\Column(name="mail", type="string", length=255)
     */
    private $mail;


    public function __construct()
    {
        $this->dateCom = new \Datetime();
        $this->billets = new ArrayCollection();
        $this->setPrixTotal(0);
        $this->setMail('ppp@pppp.com');
    }

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
     * Set dateCom
     *
     * @param \DateTime $dateCom
     *
     * @return Commande
     */
    public function setDateCom($dateCom)
    {
        $this->dateCom = $dateCom;

        return $this;
    }

    /**
     * Get dateCom
     *
     * @return \DateTime
     */
    public function getDateCom()
    {
        return $this->dateCom;
    }

    /**
     * Set dateVisite
     *
     * @param \DateTime $dateVisite
     *
     * @return Commande
     */
    public function setDateVisite($dateVisite)
    {
        $this->dateVisite = $dateVisite;

        return $this;
    }

    /**
     * Get dateVisite
     *
     * @return \DateTime
     */
    public function getDateVisite()
    {
        return $this->dateVisite;
    }

    /**
     * Set typeBillet
     *
     * @param string $typeBillet
     *
     * @return Commande
     */
    public function setTypeBillet($typeBillet)
    {
        $this->typeBillet = $typeBillet;

        return $this;
    }

    /**
     * Get typeBillet
     *
     * @return string
     */
    public function getTypeBillet()
    {
        return $this->typeBillet;
    }

    /**
     * Set nbBillet
     *
     * @param integer $nbBillet
     *
     * @return Commande
     */
    public function setNbBillet($nbBillet)
    {
        $this->nbBillet = $nbBillet;

        return $this;
    }

    /**
     * Get nbBillet
     *
     * @return int
     */
    public function getNbBillet()
    {
        return $this->nbBillet;
    }

    /**
     * Set prixTotal
     *
     * @param integer $prixTotal
     *
     * @return Commande
     */
    public function setPrixTotal($prixTotal)
    {
        $this->prixTotal = $prixTotal;

        return $this;
    }

    /**
     * Get prixTotal
     *
     * @return int
     */
    public function getPrixTotal()
    {
        return $this->prixTotal;
    }

    /**
     * Set mail
     *
     * @param string $mail
     *
     * @return Commande
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
     * Add billet
     *
     * @param \Louvres\CommandeBundle\Entity\Billet $billet
     *
     * @return Commande
     */
    public function addBillet(\Louvres\CommandeBundle\Entity\Billet $billet)
    {
    /*    $this->billets->add($billet);*/
        $this->billets[] = $billet;
        // On lie le billet à la commande
        $billet->setCommande($this);
        return $this;
    }

    /**
     * Remove billet
     *
     * @param \Louvres\CommandeBundle\Entity\Billet $billet
     */
    public function removeBillet(\Louvres\CommandeBundle\Entity\Billet $billet)
    {
        $this->billets->removeElement($billet);
    }

    /**
     * Get billets
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBillets()
    {
        return $this->billets;
    }

}
