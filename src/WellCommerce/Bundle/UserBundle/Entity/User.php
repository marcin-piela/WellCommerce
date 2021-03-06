<?php
/*
 * WellCommerce Open-Source E-Commerce Platform
 *
 * This file is part of the WellCommerce package.
 *
 * (c) Adam Piotrowski <adam@wellcommerce.org>
 *
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 */

namespace WellCommerce\Bundle\UserBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model\Blameable\Blameable;
use Knp\DoctrineBehaviors\Model\Timestampable\Timestampable;
use Symfony\Component\Security\Core\User\EquatableInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use WellCommerce\Bundle\CoreBundle\Doctrine\ORM\Behaviours\EnableableTrait;
use WellCommerce\Bundle\CoreBundle\Doctrine\ORM\Behaviours\PhotoTrait;

/**
 * User
 *
 * @ORM\Table("users")
 * @ORM\Entity(repositoryClass="WellCommerce\Bundle\UserBundle\Repository\UserRepository")
 */
class User implements \Serializable, UserInterface, EquatableInterface
{
    use Timestampable;
    use Blameable;
    use PhotoTrait;
    use EnableableTrait;

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="first_name", type="string", length=64, unique=false)
     */
    private $firstName;

    /**
     * @ORM\Column(name="last_name", type="string", length=64, unique=false)
     */
    private $lastName;

    /**
     * @ORM\Column(type="string", length=25, unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=60, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(name="salt", type="string", length=40)
     */
    private $salt;

    /**
     * @ORM\ManyToMany(targetEntity="WellCommerce\Bundle\UserBundle\Entity\Role", inversedBy="users")
     */
    private $roles;

    public function __construct()
    {
        $this->enabled = true;
        $this->roles   = new ArrayCollection();
        $this->salt    = base_convert(sha1(uniqid(mt_rand(), true)), 16, 36);
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns first name
     *
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Sets first name
     *
     * @param $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * Returns last name
     *
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Sets first name
     *
     * @param $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @inheritDoc
     */
    public function getSalt()
    {
        return;
    }

    /**
     * @inheritDoc
     */
    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @inheritDoc
     */
    public function getRoles()
    {
        return $this->roles->toArray();
    }

    public function addRole(Role $role)
    {
        $this->roles[] = $role;
    }

    /**
     * @inheritDoc
     */
    public function eraseCredentials()
    {
    }

    /**
     * @see \Serializable::serialize()
     */
    public function serialize()
    {
        return serialize([$this->id, $this->username, $this->password]);
    }

    /**
     * @see \Serializable::unserialize()
     */
    public function unserialize($serialized)
    {
        list($this->id, $this->username, $this->password) = unserialize($serialized);
    }

    public function isEqualTo(UserInterface $user)
    {
        if ($this->password !== $user->getPassword()) {
            return false;
        }

        if ($this->salt !== $user->getSalt()) {
            return false;
        }

        if ($this->username !== $user->getUsername()) {
            return false;
        }

        return true;
    }
}
