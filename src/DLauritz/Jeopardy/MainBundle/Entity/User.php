<?php

namespace DLauritz\Jeopardy\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use \Symfony\Component\Security\Core\User\UserInterface;

/**
 * DLauritz\Jeopardy\MainBundle\Entity\User
 */
class User implements UserInterface, \Serializable
{
	
	public function equals(UserInterface $other) {
		if (!$other instanceof DLauritz\Jeopardy\MainBundle\Entity\User) {
			return false;
		}
		
		if ($other->getUsername() !== $this->getUsername()) {
			return false;
		}
		
		if ($other->getPassword() !== $this->getPassword()) {
			return false;
		}
		
		if ($other->getSalt() !== $this->getSalt()) {
			return false;
		}
		
		return true;
	}
	
	public function getSalt() {
		return $this->salt;
	}
	
	public function eraseCredentials() {
	}
	
	public function getRoles() {
		// No special user roles, just user or not
		return array('ROLE_USER');
	}
	
	public function getUsername() {
		return $this->getEmail();
	}
	
	
	public function serialize() {
		return serialize($this->id);
		/*
		$arr = array('id' => $this->getId(),
				'email' => $this->getEmail(),
				'password' => $this->getPassword(),
				'display_name' => $this->getDisplayName(),
				'sessions' => $this->getSessions(),
				'games' => $this->getGames(),
				'is_active' => $this->getIsActive(),
				'salt' => $this->getSalt());
		return json_encode($arr);
		*/
	}
	
	public function unserialize($serialized) {
		$this->id = unserialize($serialized);
		/*
		$arr = json_decode($serialized);
		$this->id = $arr['id'];
		$this->email = $arr['email'];
		$this->password = $arr['password'];
		$this->display_name = $arr['display_name'];
		$this->sessions = $arr['sessions'];
		$this->games = $arr['games'];
		$this->is_active = $arr['is_active'];
		$this->salt = $arr['salt'];
		*/
	}
	
	
    /**
     * @var integer $id
     */
    protected $id;

    /**
     * @var string $email
     */
    protected $email;

    /**
     * @var string $password
     */
    protected $password;

    /**
     * @var string $display_name
     */
    protected $display_name;

    /**
     * @var DLauritz\Jeopardy\MainBundle\Entity\Session
     */
    protected $sessions;

    /**
     * @var DLauritz\Jeopardy\GameBundle\Entity\Game
     */
    protected $games;
    
    /**
     * @var boolean $is_active
     */
    protected $is_active;
    
    /**
     * @var string $salt
     */
    protected $salt;

    public function __construct()
    {
    	$this->is_active = true;
    	$this->salt = md5(uniqid(null, true));
        $this->sessions = new \Doctrine\Common\Collections\ArrayCollection();
    	$this->games = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set email
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set display_name
     *
     * @param string $displayName
     */
    public function setDisplayName($displayName)
    {
        $this->display_name = $displayName;
    }

    /**
     * Get display_name
     *
     * @return string 
     */
    public function getDisplayName()
    {
        return $this->display_name;
    }

    /**
     * Add sessions
     *
     * @param DLauritz\Jeopardy\MainBundle\Entity\Session $sessions
     */
    public function addSession(\DLauritz\Jeopardy\MainBundle\Entity\Session $sessions)
    {
        $this->sessions[] = $sessions;
    }

    /**
     * Get sessions
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getSessions()
    {
        return $this->sessions;
    }

    /**
     * Add games
     *
     * @param DLauritz\Jeopardy\GameBundle\Entity\Game $games
     */
    public function addGame(\DLauritz\Jeopardy\GameBundle\Entity\Game $games)
    {
        $this->games[] = $games;
    }

    /**
     * Get games
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getGames()
    {
        return $this->games;
    }


    /**
     * Set is_active
     *
     * @param boolean $isActive
     */
    public function setIsActive($isActive)
    {
        $this->is_active = $isActive;
    }

    /**
     * Get is_active
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->is_active;
    }


    /**
     * Set salt
     *
     * @param string $salt
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
    }
}