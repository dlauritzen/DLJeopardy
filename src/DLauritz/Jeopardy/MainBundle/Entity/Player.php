<?php

namespace DLauritz\Jeopardy\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DLauritz\Jeopardy\MainBundle\Entity\Player
 */
class Player
{
    /**
     * @var string $name
     */
    private $name;

    /**
     * @var string $color
     */
    private $color;

    /**
     * @var DLauritz\Jeopardy\MainBundle\Entity\Session
     */
    private $session;


    /**
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
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
     * Set color
     *
     * @param string $color
     */
    public function setColor($color)
    {
        $this->color = $color;
    }

    /**
     * Get color
     *
     * @return string 
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set session
     *
     * @param DLauritz\Jeopardy\MainBundle\Entity\Session $session
     */
    public function setSession(\DLauritz\Jeopardy\MainBundle\Entity\Session $session)
    {
        $this->session = $session;
    }

    /**
     * Get session
     *
     * @return DLauritz\Jeopardy\MainBundle\Entity\Session 
     */
    public function getSession()
    {
        return $this->session;
    }
    /**
     * @var bigint $id
     */
    private $id;


    /**
     * Get id
     *
     * @return bigint 
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @var string $web_session
     */
    private $web_session;


    /**
     * Set web_session
     *
     * @param string $webSession
     */
    public function setWebSession($webSession)
    {
        $this->web_session = $webSession;
    }

    /**
     * Get web_session
     *
     * @return string 
     */
    public function getWebSession()
    {
        return $this->web_session;
    }
}