<?php

namespace DLauritz\Jeopardy\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DLauritz\Jeopardy\GameBundle\Entity\Game
 */
class Game
{
    /**
     * @var bigint $id
     */
    private $id;

    /**
     * @var string $final_category
     */
    private $final_category;

    /**
     * @var string $final_question
     */
    private $final_question;

    /**
     * @var string $final_answer
     */
    private $final_answer;

    /**
     * @var DLauritz\Jeopardy\GameBundle\Entity\Board
     */
    private $single_board;

    /**
     * @var DLauritz\Jeopardy\GameBundle\Entity\Board
     */
    private $double_board;

    public function getBoard($stage) {
    	switch($stage) {
    		case 1:
    			return $this->getSingleBoard();
    		case 2:
    			return $this->getDoubleBoard();
    		case 3:
    			return array('category' => $this->getFinalCategory(), 'question' => $this->getFinalQuestion(), 'answer' => $this->getFinalAnswer());
    		default:
    			return null;
    	}
    }

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
     * Set final_category
     *
     * @param string $finalCategory
     */
    public function setFinalCategory($finalCategory)
    {
        $this->final_category = $finalCategory;
    }

    /**
     * Get final_category
     *
     * @return string 
     */
    public function getFinalCategory()
    {
        return $this->final_category;
    }

    /**
     * Set final_question
     *
     * @param string $finalQuestion
     */
    public function setFinalQuestion($finalQuestion)
    {
        $this->final_question = $finalQuestion;
    }

    /**
     * Get final_question
     *
     * @return string 
     */
    public function getFinalQuestion()
    {
        return $this->final_question;
    }

    /**
     * Set final_answer
     *
     * @param string $finalAnswer
     */
    public function setFinalAnswer($finalAnswer)
    {
        $this->final_answer = $finalAnswer;
    }

    /**
     * Get final_answer
     *
     * @return string 
     */
    public function getFinalAnswer()
    {
        return $this->final_answer;
    }

    /**
     * Set single_board
     *
     * @param DLauritz\Jeopardy\GameBundle\Entity\Board $singleBoard
     */
    public function setSingleBoard(\DLauritz\Jeopardy\GameBundle\Entity\Board $singleBoard)
    {
        $this->single_board = $singleBoard;
    }

    /**
     * Get single_board
     *
     * @return DLauritz\Jeopardy\GameBundle\Entity\Board 
     */
    public function getSingleBoard()
    {
        return $this->single_board;
    }

    /**
     * Set double_board
     *
     * @param DLauritz\Jeopardy\GameBundle\Entity\Board $doubleBoard
     */
    public function setDoubleBoard(\DLauritz\Jeopardy\GameBundle\Entity\Board $doubleBoard)
    {
        $this->double_board = $doubleBoard;
    }

    /**
     * Get double_board
     *
     * @return DLauritz\Jeopardy\GameBundle\Entity\Board 
     */
    public function getDoubleBoard()
    {
        return $this->double_board;
    }
    /**
     * @var boolean $public
     */
    private $public;

    /**
     * @var DLauritz\Jeopardy\MainBundle\Entity\Session
     */
    private $sessions;

    /**
     * @var DLauritz\Jeopardy\MainBundle\Entity\User
     */
    private $owner;

    public function __construct()
    {
        $this->sessions = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Set public
     *
     * @param boolean $public
     */
    public function setPublic($public)
    {
        $this->public = $public;
    }

    /**
     * Get public
     *
     * @return boolean 
     */
    public function getPublic()
    {
        return $this->public;
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
     * Set owner
     *
     * @param DLauritz\Jeopardy\MainBundle\Entity\User $owner
     */
    public function setOwner(\DLauritz\Jeopardy\MainBundle\Entity\User $owner)
    {
        $this->owner = $owner;
    }

    /**
     * Get owner
     *
     * @return DLauritz\Jeopardy\MainBundle\Entity\User 
     */
    public function getOwner()
    {
        return $this->owner;
    }
    /**
     * @var string $name
     */
    private $name;


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
}