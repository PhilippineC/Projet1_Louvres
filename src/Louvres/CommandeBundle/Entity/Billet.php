<?php

namespace Louvres\CommandeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Billet
 *
 * @ORM\Table(name="billet")
 * @ORM\Entity(repositoryClass="Louvres\CommandeBundle\Repository\BilletRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Billet
{
    CONST BILLET_GRATUIT = 'gratuit';
    CONST BILLET_ENF = 'enfant';
    CONST BILLET_NORM = 'normal';
    CONST BILLET_SENIOR = 'senior';
    CONST BILLET_FAMILLE = 'famille';
    CONST BILLET_REDUIT = 'reduit';
    CONST NOT_FOUND = 'undefini';

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
     * @ORM\Column(name="tarif", type="string", nullable=true)
     */
    private $tarif;

    /**
     * @var int
     * @ORM\Column(name="meme_nom", type="integer")
     */
    private $memeNom = 0;

    /**
     * @var bool
     * @ORM\Column(name="famille", type="boolean")
     */
    private $famille = false;

    /**
     * @var string
     * @ORM\Column(name="tarif_calcule", type="string", nullable=true)
     */
    private $tarifCalcule;

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

    /**
     * @ORM\PostPersist
     */
    public function calculTarif() {
        $today = new \DateTime();
        $datenormal = new \DateTime();
        $date_enfant = new \DateTime();
        $date_senior = new \DateTime();
        $date_normal = $datenormal->sub(new \DateInterval('P12Y'));
        $date_enfant = $date_enfant->sub(new \DateInterval('P4Y'));
        $date_senior = $date_senior->sub(new \DateInterval('P60Y'));
        if (($this->dateNaissance > $date_enfant) && ($this->dateNaissance <= $today)) {
            $this->setTarif(self::BILLET_GRATUIT);
        }
        elseif ($this->dateNaissance <= $date_senior) {
            $this->setTarif(self::BILLET_SENIOR);
        }
        else if ($this->dateNaissance <= $date_normal) {
            $this->setTarif(self::BILLET_NORM);
        }
        else if ($this->dateNaissance <= $date_enfant)  {
            $this->setTarif(self::BILLET_ENF);
        }
        else $this->setTarif(self::NOT_FOUND);
    }

    /**
     * Inc memeNom
     *
     * @param \int $memeNom
     *
     * @return Billet
     */
    public function incMemeNom()
    {
        $this->memeNom ++;
        return $this;
    }

    /**
     * Set memeNom
     *
     * @param \int $memeNom
     *
     * @return Billet
     */
    public function setMemeNom($memeNom)
    {
        $this->memeNom = $memeNom;
        return $this;
    }

    /**
     * Get memeNom
     *
     * @return \int
     */
    public function getMemeNom()
    {
        return $this->memeNom;
    }

    /**
     * Set famille
     *
     * @param boolean $famille
     *
     * @return Billet
     */
    public function setFamille($famille)
    {
        $this->famille = $famille;

        return $this;
    }

    /**
     * Get famille
     *
     * @return boolean
     */
    public function getFamille()
    {
        return $this->famille;
    }

    /**
     * Set tarifCalcule
     *
     * @param string $tarifCalcule
     *
     * @return Billet
     */
    public function setTarifCalcule($tarifCalcule)
    {
        $this->tarifCalcule = $tarifCalcule;

        return $this;
    }

    /**
     * Get tarifCalcule
     *
     * @return string
     */
    public function getTarifCalcule()
    {
        return $this->tarifCalcule;
    }
}
