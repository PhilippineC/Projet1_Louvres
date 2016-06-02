<?php

namespace Louvres\CommandeBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
use Symfony\Component\Validator\Context\ExecutionContextInterface;
use Doctrine\ORM\EntityManager;

/**
 * Commande
 *
 * @ORM\Table(name="commande")
 * @ORM\Entity(repositoryClass="Louvres\CommandeBundle\Repository\CommandeRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Commande
{

    CONST TARIF_NORMAL = 16;
    CONST TARIF_ENF = 8;
    CONST TARIF_SENIOR = 12;
    CONST TARIF_REDUIT = 10;
    CONST TARIF_FAMILLE = 35;
    CONST MEMBRES_MEME_FAMILLE = 4;
    CONST MEMBRES_FAMILLE_ENF = 2;
    CONST MEMBRES_FAMILLE_NORM = 2;

    /**
     * @ORM\OneToMany(targetEntity="Louvres\CommandeBundle\Entity\Billet", mappedBy="commande", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */

    private $billets;

    /**
     * @ORM\OneToOne(targetEntity="Louvres\CommandeBundle\Entity\Confirmation", cascade={"persist"})
     */
    private $confirmation;

    /**
     * @ORM\Column(type="guid")
     * @Assert\Uuid
     * @ORM\GeneratedValue(strategy="UUID")
     */

    private $code;
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
     * @Assert\DateTime()
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
     * @ORM\Column(name="nb_billet", type="integer", nullable=true)
     */
    private $nbBillet;

    /**
     * @var int
     * @ORM\Column(name="prix_total", type="integer")
     */
    private $prixTotal = 0;

    /**
     * @var string
     * @ORM\Column(name="status", type="string", length=255, nullable=true)
     */
    private $status;


    public function __construct()
    {
        $this->dateCom = new \Datetime();
        $this->setStatus('en_cours');
        $this->billets = new ArrayCollection();
        $this->generateCode();
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
     * Add prixTotal
     *
     * @param integer $prixTotal
     *
     * @return Commande
     */
    public function addPrixTotal($prixTotal)
    {
        $this->prixTotal += $prixTotal;

        return $this;
    }

    /**
     * Set prixTotal
     *
     * @param integer $prixTotal
     *
     * @return Commande
     */
    public function SetPrixTotal($prixTotal)
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
     * Add billet
     *
     * @param \Louvres\CommandeBundle\Entity\Billet $billet
     *
     * @return Commande
     */
    public function addBillet(\Louvres\CommandeBundle\Entity\Billet $billet)
    {
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

    public function calculPrixTotal()
    {
        /* On détermine d'abord l'attribut famille à false ou true en fonction des tarifs de la commande*/
        $normal = 0; $enfant = 0;
        $decr_enf = self::MEMBRES_FAMILLE_ENF; $decr_norm = self::MEMBRES_FAMILLE_NORM;
        foreach ($this->billets as $billet1) {
            $billet1->setMemeNom(1); // On réinitialise à chaque calcul du tarif famille
            foreach ($this->billets as $billet2) {
                if ($billet1 !== $billet2) {
                    if ($billet1->getNom() == $billet2->getNom()) {
                        $billet1->incMemeNom();
                    }
                }
            }
            if ($billet1->getMemeNom() >= self::MEMBRES_MEME_FAMILLE) {
                switch ($billet1->getTarif()) {
                    case Billet::BILLET_NORM:
                        $normal++;
                        break;
                    case Billet::BILLET_ENF:
                        $enfant++;
                        break;
                }
            }
        }

        if (($normal > 1) && ($enfant > 1)) {
            foreach ($this->billets as $billet) {
                if ($billet->getMemeNom() >= self::MEMBRES_MEME_FAMILLE) {
                    if (($billet->getTarif() == Billet::BILLET_ENF) && ($decr_enf > 0)) {
                        $billet->setTarif(Billet::BILLET_FAMILLE);
                        $billet->setFamille(true);
                        $decr_enf --;
                    }
                    if (($billet->getTarif() == Billet::BILLET_NORM) && ($decr_norm > 0)) {
                        $billet->setTarif(Billet::BILLET_FAMILLE);
                        $billet->setFamille(true);
                        $decr_norm --;
                    }
                }
            }
        }
        /* On peut ensuite calculer le prix total de la commande */
        $this->setPrixTotal(0); // On réinitialise le prix de la commande à chaque calcul
        $nb_tarif_famille = 0; // Un seul billet famille par commande
        foreach ($this->billets as $billet) {
            if ($billet->getFamille()) {
                $billet->setTarifCalcule(Billet::BILLET_FAMILLE);
                if ($nb_tarif_famille == 0) {
                    $this->addPrixTotal(self::TARIF_FAMILLE);
                    $nb_tarif_famille ++;
                }
            }
            elseif ($billet->getReduit()) {
                $this->addPrixTotal(self::TARIF_REDUIT);
                $billet->setTarifCalcule(Billet::BILLET_REDUIT);
            }
            else {
                switch ($billet->getTarif()) {
                    case Billet::BILLET_NORM:
                        $this->addPrixTotal(self::TARIF_NORMAL);
                        $billet->setTarifCalcule(Billet::BILLET_NORM);
                        break;
                    case Billet::BILLET_ENF:
                        $this->addPrixTotal(self::TARIF_ENF);
                        $billet->setTarifCalcule(Billet::BILLET_ENF);
                        break;
                    case Billet::BILLET_SENIOR:
                        $this->addPrixTotal(self::TARIF_SENIOR);
                        $billet->setTarifCalcule(Billet::BILLET_SENIOR);
                        break;
                }
            }
        }
    }


    /**
     * Set status
     *
     * @param string $status
     *
     * @return Commande
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }



    /**
     * Set confirmation
     *
     * @param \Louvres\CommandeBundle\Entity\Confirmation $confirmation
     *
     * @return Commande
     */
    public function setConfirmation(\Louvres\CommandeBundle\Entity\Confirmation $confirmation = null)
    {
        $this->confirmation = $confirmation;

        return $this;
    }

    /**
     * Get confirmation
     *
     * @return \Louvres\CommandeBundle\Entity\Confirmation
     */
    public function getConfirmation()
    {
        return $this->confirmation;
    }

    /**
     * Set code
     *
     * @param string $code
     *
     * @return Commande
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @ORM\PostPersist
     */
    public function generateCode()
    {
        try {
            $this->setCode(Uuid::uuid1());
        } catch (UnsatisfiedDependencyException $e) {
            echo 'Caught exception: ' . $e->getMessage() . "\n";
        }
    }

    /**
     * @Assert\Callback
     */
    public function isTypeBilletValide(ExecutionContextInterface $context)
    {
        // On vérifie que le billet est bien de type demi-journee pour une dateVisite à aujourd'hui après 14h
        list($date, $time) = explode(' ', $this->dateCom->format('Y-m-d H:i:s'));
        $hour = explode(':', $time)[0];
    /*    $this->setDateVisite(new \DateTime());*/
    /*    $hour = 15;*/
        if (($this->getDateVisite()->format('Y-m-d') == $date) && ($hour > 13) && ($this->getTypeBillet() == 'demi-journee')) {
            var_dump($context);
            $context
                ->buildViolation('Vous ne pouvez plus sélectionner un billet journée pour aujourd\'hui') // message
                ->atPath('typeBillet')  // attribut de l'objet qui est violé
                ->addViolation() // ceci déclenche l'erreur
            ;
        }
    }
}
