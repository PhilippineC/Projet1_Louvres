<?php
namespace Louvres\CommandeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Payum\Core\Model\Payment as BasePayment;

/**
 * @ORM\Table
 * @ORM\Entity
 */
class Payment extends BasePayment
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
    protected $commande;

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
     * @return Payment
     */
    public function setCommande(\Louvres\CommandeBundle\Entity\Commande $commande = null)
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
