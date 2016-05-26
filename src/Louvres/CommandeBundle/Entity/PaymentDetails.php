<?php
namespace Louvres\CommandeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Payum\Core\Model\ArrayObject;

/**
 * @ORM\Table
 * @ORM\Entity
 */
class PaymentDetails extends ArrayObject
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     *
     * @var integer $id
     */
    protected $id;

    /**
     * @ORM\OneToOne(targetEntity="Louvres\CommandeBundle\Entity\Commande", cascade={"persist"})
     */
    private $commande;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set commande
     *
     * @param \Louvres\CommandeBundle\Entity\Commande $commande
     *
     * @return PaymentDetails
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
}
