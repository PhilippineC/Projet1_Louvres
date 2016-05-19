<?php

namespace Louvres\CommandeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Billet
 *
 * @ORM\Table(name="billet")
 * @ORM\Entity(repositoryClass="Louvres\CommandeBundle\Repository\BilletRepository")
 */
class Billet
{
    /**
     * @ORM\ManyToOne(targetEntity="Louvres\CommandeBundle\Entity\Commande", inversedBy="billets", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */

    private $commande;
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var bool
     * @ORM\Column(name="reduit", type="boolean")
     */
    private $reduit = false;

    /**
     * @var string
     * @Assert\Length(min=2, minMessage = "Saisir au moins deux caractères")
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     * @Assert\Length(min=2)
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="pays", type="string", length=255)
     */
    private $pays;

    /**
     * @var \DateTime
     * @Assert\Date()
     * @ORM\Column(name="date_naissance", type="date")
     */
    private $dateNaissance;

    /**
     * @var string
     * @ORM\Column(name="tarif", type="string")
     */
    private $tarif = '';

    public function __construct() {

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
     * Set reduit
     *
     * @param string $reduit
     *
     * @return Billet
     */
    public function setreduit($reduit)
    {
        $this->reduit = $reduit;

        return $this;
    }

    /**
     * Get reduit
     *
     * @return string
     */
    public function getreduit()
    {
        return $this->reduit;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Billet
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Billet
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set pays
     *
     * @param string $pays
     *
     * @return Billet
     */
    public function setPays($pays)
    {
        $this->pays = $pays;

        return $this;
    }

    /**
     * Get pays
     *
     * @return string
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * Set dateNaissance
     *
     * @param \DateTime $dateNaissance
     *
     * @return Billet
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    /**
     * Get dateNaissance
     *
     * @return \DateTime
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * Set commande
     *
     * @param \Louvres\CommandeBundle\Entity\Commande $commande
     *
     * @return Billet
     */
    public function setCommande(\Louvres\CommandeBundle\Entity\Commande $commande)
    {
        $this->commande = $commande;

        return $this;
    }

    /**
     * Get commande
     *
     * @return \Louvres\CommandeBundle\Entity\Commande
     */
    public function getCommande()
    {
        return $this->commande;
    }

    public function addCommande(Commande $commande) {
        if (!$this->commande->contains($commande)) {
            $this->commande->add($commande);
        }
    }


    /**
     * Set tarif
     *
     * @param \string $tarif
     *
     * @return Billet
     */
    public function setTarif($tarif)
    {
        $this->tarif = $tarif;

        return $this;
    }

    /**
     * Get tarif
     *
     * @return \string
     */
    public function getTarif()
    {
        return $this->tarif;
    }

    public function calculTarif() {
        $today = new \DateTime();
        $date_normal = $today->sub(new \DateInterval('P12Y'));
        $date_enfant = $today->sub(new \DateInterval('P4Y'));
        $date_senior = $today->sub(new \DateInterval('P60Y'));

        if (($this->dateNaissance > $date_enfant) && ($this->dateNaissance <= $today)) {
            $this->setTarif('gratuit');
        }
        elseif ($this->dateNaissance <= $date_senior) {
            $this->setTarif('senior');
        }
        else if ($this->dateNaissance <= $date_normal) {
            $this->setTarif('normal');
        }
        else if ($this->dateNaissance <= $date_enfant)  {
            $this->setTarif('enfant');
        }
    }
}
