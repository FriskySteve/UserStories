<?php

namespace Frisky\AddressBookBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GroupOfUsers
 *
 * @ORM\Table(name="group_of_users")
 * @ORM\Entity(repositoryClass="Frisky\AddressBookBundle\Repository\GroupOfUsersRepository")
 */
class GroupOfUsers
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
     * @ORM\Column(name="group_name", type="string", length=255)
     */
    private $groupName;
    
    /**
     * use Doctrine\Common\Collections\ArrayCollection;
     * @ORM\ManyToMany(targetEntity="Person", inversedBy="$groups")
     * @ORM\JoinTable(name="groups_users")
     * @var type 
     */
    
    private $users;


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
     * Set groupName
     *
     * @param string $groupName
     * @return GroupOfUsers
     */
    public function setGroupName($groupName)
    {
        $this->groupName = $groupName;

        return $this;
    }

    /**
     * Get groupName
     *
     * @return string 
     */
    public function getGroupName()
    {
        return $this->groupName;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add users
     *
     * @param \Frisky\AddressBookBundle\Entity\Person $users
     * @return GroupOfUsers
     */
    public function addUser(\Frisky\AddressBookBundle\Entity\Person $users)
    {
        $this->users[] = $users;

        return $this;
    }

    /**
     * Remove users
     *
     * @param \Frisky\AddressBookBundle\Entity\Person $users
     */
    public function removeUser(\Frisky\AddressBookBundle\Entity\Person $users)
    {
        $this->users->removeElement($users);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsers()
    {
        return $this->users;
    }
}
