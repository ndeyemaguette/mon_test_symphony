<?php

namespace CarnetAdresseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\DateTime;
/**
 * CarnetAdresse
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="CarnetAdresseBundle\Entity\CarnetAdresseRepository")
 */
class CarnetAdresse
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;

    /**
     * @var string
     *
     * @ORM\Column(name="Date_contact", type="string", length=255)
     */
    private $dateContact;
    
    /**
     * @Assert\NotBlank()
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User", inversedBy="carnetAdresseContact", cascade={"persist"})
     * @ORM\JoinColumn(name="contact_id", referencedColumnName="id")
     */
    private $contact;
    
    /**
     * @Assert\NotBlank()
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User", inversedBy="carnetAdresse", cascade={"persist"})
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
    * @var datetime $date
    *
    * @ORM\Column(name="date", type="datetime")
    */
    private $date;
    
    public function __construct()
    {
        $this->date = new \DateTime();
    }

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
     * Set libelle
     *
     * @param string $libelle
     * @return CarnetAdresse
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string 
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     * @return CarnetAdresse
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string 
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return CarnetAdresse
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set user
     *
     * @param \UserBundle\Entity\User $user
     * @return CarnetAdresse
     */
    public function setUser(\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set dateContact
     *
     * @param string $dateContact
     * @return CarnetAdresse
     */
    public function setDateContact($dateContact)
    {
        $this->dateContact = $dateContact;

        return $this;
    }

    /**
     * Get dateContact
     *
     * @return string 
     */
    public function getDateContact()
    {
        return $this->dateContact;
    }

    /**
     * Set contact
     *
     * @param \UserBundle\Entity\User $contact
     * @return CarnetAdresse
     */
    public function setContact(\UserBundle\Entity\User $contact = null)
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * Get contact
     *
     * @return \UserBundle\Entity\User 
     */
    public function getContact()
    {
        return $this->contact;
    }
}
