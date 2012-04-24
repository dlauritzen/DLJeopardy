<?php

namespace DLauritz\Jeopardy\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DLauritz\Jeopardy\GameBundle\Entity\Board
 */
class Board
{
    /**
     * @var bigint $id
     */
    private $id;

    /**
     * @var DLauritz\Jeopardy\GameBundle\Entity\Column
     */
    private $column_one;

    /**
     * @var DLauritz\Jeopardy\GameBundle\Entity\Column
     */
    private $column_two;

    /**
     * @var DLauritz\Jeopardy\GameBundle\Entity\Column
     */
    private $column_three;

    /**
     * @var DLauritz\Jeopardy\GameBundle\Entity\Column
     */
    private $column_four;

    /**
     * @var DLauritz\Jeopardy\GameBundle\Entity\Column
     */
    private $column_five;

    /**
     * @var DLauritz\Jeopardy\GameBundle\Entity\Column
     */
    private $column_six;
    
    public function numColumns() {
    	return 6;
    }
    
    public function getColumns() {
    	$cols = array();
    	for ($i = 1; $i <= $this->numColumns(); $i++) {
    		$cols[] = $this->getColumn($i);
    	}
    	return $cols;
    }
    
    public function getColumn($num) {
    	switch($num) {
    		case 1:
    			return $this->getColumnOne();
    		case 2:
    			return $this->getColumnTwo();
    		case 3:
    			return $this->getColumnThree();
    		case 4:
    			return $this->getColumnFour();
    		case 5:
    			return $this->getColumnFive();
    		case 6:
    			return $this->getColumnSix();
    		default:
    			return array();
    	}
    }
    
    public function getQuestion($column, $number) {
    	return $this->getColumn($column)->getQuestion($number);
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
     * Set column_one
     *
     * @param DLauritz\Jeopardy\GameBundle\Entity\Column $columnOne
     */
    public function setColumnOne(\DLauritz\Jeopardy\GameBundle\Entity\Column $columnOne)
    {
        $this->column_one = $columnOne;
    }

    /**
     * Get column_one
     *
     * @return DLauritz\Jeopardy\GameBundle\Entity\Column 
     */
    public function getColumnOne()
    {
        return $this->column_one;
    }

    /**
     * Set column_two
     *
     * @param DLauritz\Jeopardy\GameBundle\Entity\Column $columnTwo
     */
    public function setColumnTwo(\DLauritz\Jeopardy\GameBundle\Entity\Column $columnTwo)
    {
        $this->column_two = $columnTwo;
    }

    /**
     * Get column_two
     *
     * @return DLauritz\Jeopardy\GameBundle\Entity\Column 
     */
    public function getColumnTwo()
    {
        return $this->column_two;
    }

    /**
     * Set column_three
     *
     * @param DLauritz\Jeopardy\GameBundle\Entity\Column $columnThree
     */
    public function setColumnThree(\DLauritz\Jeopardy\GameBundle\Entity\Column $columnThree)
    {
        $this->column_three = $columnThree;
    }

    /**
     * Get column_three
     *
     * @return DLauritz\Jeopardy\GameBundle\Entity\Column 
     */
    public function getColumnThree()
    {
        return $this->column_three;
    }

    /**
     * Set column_four
     *
     * @param DLauritz\Jeopardy\GameBundle\Entity\Column $columnFour
     */
    public function setColumnFour(\DLauritz\Jeopardy\GameBundle\Entity\Column $columnFour)
    {
        $this->column_four = $columnFour;
    }

    /**
     * Get column_four
     *
     * @return DLauritz\Jeopardy\GameBundle\Entity\Column 
     */
    public function getColumnFour()
    {
        return $this->column_four;
    }

    /**
     * Set column_five
     *
     * @param DLauritz\Jeopardy\GameBundle\Entity\Column $columnFive
     */
    public function setColumnFive(\DLauritz\Jeopardy\GameBundle\Entity\Column $columnFive)
    {
        $this->column_five = $columnFive;
    }

    /**
     * Get column_five
     *
     * @return DLauritz\Jeopardy\GameBundle\Entity\Column 
     */
    public function getColumnFive()
    {
        return $this->column_five;
    }

    /**
     * Set column_six
     *
     * @param DLauritz\Jeopardy\GameBundle\Entity\Column $columnSix
     */
    public function setColumnSix(\DLauritz\Jeopardy\GameBundle\Entity\Column $columnSix)
    {
        $this->column_six = $columnSix;
    }

    /**
     * Get column_six
     *
     * @return DLauritz\Jeopardy\GameBundle\Entity\Column 
     */
    public function getColumnSix()
    {
        return $this->column_six;
    }
}