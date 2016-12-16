<?php

namespace Frisky\AddressBookBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Person
 *
 * @ORM\Table(name="person")
 * @ORM\Entity(repositoryClass="Frisky\AddressBookBundle\Repository\PersonRepository")
 */
class Person
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
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=255)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;
    
    /**
     * @ORM\ManyToOne(targetEntity="Address", inversedBy="persons")
     * @ORM\JoinColumn(name="address_id", referencedColumnName="id")
     */
    
    private $address;
    
    /**
     * @ORM\OneToMany(targetEntity="Phone", mappedBy="person")
     * @var type 
     */
    
    private $phones;
    
    /**
     * @ORM\OneToMany(targetEntity="Email", mappedBy="person")
     * @var type 
     */
    
    private $emails;
    
    /**
     * use Doctrine\Common\Collections\ArrayCollection;
     * @ORM\ManyToMany(targetEntity="GroupOfUsers", mappedBy="users")
     * @var type 
     */
    
    private $groups;

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
     * Set name
     *
     * @param string $name
     * @return Person
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return Person
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Person
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->phones = new \Doctrine\Common\Collections\ArrayCollection();
        $this->emails = new \Doctrine\Common\Collections\ArrayCollection();
        $this->groups = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set address
     *
     * @param \Frisky\AddressBookBundle\Entity\Address $address
     * @return Person
     */
    public function setAddress(\Frisky\AddressBookBundle\Entity\Address $address = null)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return \Frisky\AddressBookBundle\Entity\Address 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Add phones
     *
     * @param \Frisky\AddressBookBundle\Entity\Phone $phones
     * @return Person
     */
    public function addPhone(\Frisky\AddressBookBundle\Entity\Phone $phones)
    {
        $this->phones[] = $phones;

        return $this;
    }

    /**
     * Remove phones
     *
     * @param \Frisky\AddressBookBundle\Entity\Phone $phones
     */
    public function removePhone(\Frisky\AddressBookBundle\Entity\Phone $phones)
    {
        $this->phones->removeElement($phones);
    }

    /**
     * Get phones
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPhones()
    {
        return $this->phones;
    }

    /**
     * Add emails
     *
     * @param \Frisky\AddressBookBundle\Entity\Email $emails
     * @return Person
     */
    public function addEmail(\Frisky\AddressBookBundle\Entity\Email $emails)
    {
        $this->emails[] = $emails;

        return $this;
    }

    /**
     * Remove emails
     *
     * @param \Frisky\AddressBookBundle\Entity\Email $emails
     */
    public function removeEmail(\Frisky\AddressBookBundle\Entity\Email $emails)
    {
        $this->emails->removeElement($emails);
    }

    /**
     * Get emails
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEmails()
    {
        return $this->emails;
    }

    /**
     * Add groups
     *
     * @param \Frisky\AddressBookBundle\Entity\GroupOfUsers $groups
     * @return Person
     */
    public function addGroup(\Frisky\AddressBookBundle\Entity\GroupOfUsers $groups)
    {
        $this->groups[] = $groups;

        return $this;
    }

    /**
     * Remove groups
     *
     * @param \Frisky\AddressBookBundle\Entity\GroupOfUsers $groups
     */
    public function removeGroup(\Frisky\AddressBookBundle\Entity\GroupOfUsers $groups)
    {
        $this->groups->removeElement($groups);
    }

    /**
     * Get groups
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGroups()
    {
        return $this->groups;
    }
    
    
}
