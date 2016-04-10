<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="UserBundle\Entity\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=100, nullable=true)
     */
    private $nom;
    
    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=100, nullable=true)
     */
    private $prenom;
    
    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=100, nullable=true)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="siteWeb", type="string", length=255, nullable=true)
     */
    private $siteWeb;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=255, nullable=true)
     */
    private $telephone;
    
    /**
     * @ORM\OneToMany(targetEntity="CarnetAdresseBundle\Entity\CarnetAdresse", mappedBy="contact" , cascade={"all"})
     */
    private $carnetAdresseContact;
    
    /**
     * @ORM\OneToMany(targetEntity="CarnetAdresseBundle\Entity\CarnetAdresse", mappedBy="user" , cascade={"all"})
     */
    private $carnetAdresse;
    
    public function __construct()
    {
        parent::__construct();
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
     * Set adresse
     *
     * @param string $adresse
     * @return User
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string 
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set siteWeb
     *
     * @param string $siteWeb
     * @return User
     */
    public function setSiteWeb($siteWeb)
    {
        $this->siteWeb = $siteWeb;

        return $this;
    }

    /**
     * Get siteWeb
     *
     * @return string 
     */
    public function getSiteWeb()
    {
        return $this->siteWeb;
    }

    /**
     * Add carnetAdresse
     *
     * @param \CarnetAdresseBundle\Entity\CarnetAdresse $carnetAdresse
     * @return User
     */
    public function addCarnetAdresse(\CarnetAdresseBundle\Entity\CarnetAdresse $carnetAdresse)
    {
        $this->carnetAdresse[] = $carnetAdresse;

        return $this;
    }

    /**
     * Remove carnetAdresse
     *
     * @param \CarnetAdresseBundle\Entity\CarnetAdresse $carnetAdresse
     */
    public function removeCarnetAdresse(\CarnetAdresseBundle\Entity\CarnetAdresse $carnetAdresse)
    {
        $this->carnetAdresse->removeElement($carnetAdresse);
    }

    /**
     * Get carnetAdresse
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCarnetAdresse()
    {
        return $this->carnetAdresse;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     * @return User
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
     * Add carnetAdresseContact
     *
     * @param \CarnetAdresseBundle\Entity\CarnetAdresse $carnetAdresseContact
     * @return User
     */
    public function addCarnetAdresseContact(\CarnetAdresseBundle\Entity\CarnetAdresse $carnetAdresseContact)
    {
        $this->carnetAdresseContact[] = $carnetAdresseContact;

        return $this;
    }

    /**
     * Remove carnetAdresseContact
     *
     * @param \CarnetAdresseBundle\Entity\CarnetAdresse $carnetAdresseContact
     */
    public function removeCarnetAdresseContact(\CarnetAdresseBundle\Entity\CarnetAdresse $carnetAdresseContact)
    {
        $this->carnetAdresseContact->removeElement($carnetAdresseContact);
    }

    /**
     * Get carnetAdresseContact
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCarnetAdresseContact()
    {
        return $this->carnetAdresseContact;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return User
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
     * @return User
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
}
