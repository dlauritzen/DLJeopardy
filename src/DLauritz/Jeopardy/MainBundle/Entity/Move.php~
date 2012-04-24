<?php

namespace DLauritz\Jeopardy\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DLauritz\Jeopardy\MainBundle\Entity\Move
 */
class Move
{
    /**
     * @var bigint $id
     */
    private $id;

    /**
     * @var smallint $board
     */
    private $board;

    /**
     * @var smallint $column
     */
    private $column;

    /**
     * @var smallint $question
     */
    private $question;

    /**
     * @var boolean $correct
     */
    private $correct;

    /**
     * @var string $answer
     */
    private $answer;

    /**
     * @var DLauritz\Jeopardy\MainBundle\Entity\Session
     */
    private $session;

    /**
     * @var DLauritz\Jeopardy\MainBundle\Entity\Player
     */
    private $player;


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
     * Set board
     *
     * @param smallint $board
     */
    public function setBoard($board)
    {
        $this->board = $board;
    }

    /**
     * Get board
     *
     * @return smallint 
     */
    public function getBoard()
    {
        return $this->board;
    }

    /**
     * Set column
     *
     * @param smallint $column
     */
    public function setColumn($column)
    {
        $this->column = $column;
    }

    /**
     * Get column
     *
     * @return smallint 
     */
    public function getColumn()
    {
        return $this->column;
    }

    /**
     * Set question
     *
     * @param smallint $question
     */
    public function setQuestion($question)
    {
        $this->question = $question;
    }

    /**
     * Get question
     *
     * @return smallint 
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Set correct
     *
     * @param boolean $correct
     */
    public function setCorrect($correct)
    {
        $this->correct = $correct;
    }

    /**
     * Get correct
     *
     * @return boolean 
     */
    public function getCorrect()
    {
        return $this->correct;
    }

    /**
     * Set answer
     *
     * @param string $answer
     */
    public function setAnswer($answer)
    {
        $this->answer = $answer;
    }

    /**
     * Get answer
     *
     * @return string 
     */
    public function getAnswer()
    {
        return $this->answer;
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
     * Set player
     *
     * @param DLauritz\Jeopardy\MainBundle\Entity\Player $player
     */
    public function setPlayer(\DLauritz\Jeopardy\MainBundle\Entity\Player $player)
    {
        $this->player = $player;
    }

    /**
     * Get player
     *
     * @return DLauritz\Jeopardy\MainBundle\Entity\Player 
     */
    public function getPlayer()
    {
        return $this->player;
    }
}