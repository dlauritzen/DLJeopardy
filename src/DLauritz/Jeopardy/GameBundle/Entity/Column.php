<?php

namespace DLauritz\Jeopardy\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DLauritz\Jeopardy\GameBundle\Entity\Column
 */
class Column
{
	
    /**
     * @var bigint $id
     */
    private $id;

    /**
     * @var string $name
     */
    private $name;

    /**
     * @var integer $question_1_value
     */
    private $question_1_value;

    /**
     * @var string $question_1_text
     */
    private $question_1_text;

    /**
     * @var string $question_1_answer
     */
    private $question_1_answer;
    
    /**
     * @var integer $question_2_value
     */
    private $question_2_value;
    
    /**
     * @var string $question_2_text
     */
    private $question_2_text;
    
    /**
     * @var string $question_2_answer
     */
    private $question_2_answer;
    
    /**
     * @var integer $question_3_value
     */
    private $question_3_value;
    
    /**
     * @var string $question_3_text
     */
    private $question_3_text;
    
    /**
     * @var string $question_3_answer
     */
    private $question_3_answer;
    
    /**
     * @var integer $question_4_value
     */
    private $question_4_value;
    
    /**
     * @var string $question_4_text
     */
    private $question_4_text;
    
    /**
     * @var string $question_4_answer
     */
    private $question_4_answer;
    
    /**
     * @var integer $question_5_value
     */
    private $question_5_value;
    
    /**
     * @var string $question_5_text
     */
    private $question_5_text;
    
    /**
     * @var string $question_5_answer
     */
    private $question_5_answer;
    
    public function numQuestions() {
    	return 5;
    }
	
	public function getQuestions() {
		$qs = array();
		for ($i = 1; $i <= $this->numQuestions(); $i++) {
			$qs[] = $this->getQuestion($i);
		}
		return $qs;
	}
	
	public function getQuestion($num) {
		switch($num) {
			case 1:
				return array("value" => $this->getQuestion1Value(), "text" => $this->getQuestion1Text(), "answer" => $this->getQuestion1Answer());
			case 2:
				return array("value" => $this->getQuestion2Value(), "text" => $this->getQuestion2Text(), "answer" => $this->getQuestion2Answer());
			case 3:
				return array("value" => $this->getQuestion3Value(), "text" => $this->getQuestion3Text(), "answer" => $this->getQuestion3Answer());
			case 4:
				return array("value" => $this->getQuestion4Value(), "text" => $this->getQuestion4Text(), "answer" => $this->getQuestion4Answer());
			case 5:
				return array("value" => $this->getQuestion5Value(), "text" => $this->getQuestion5Text(), "answer" => $this->getQuestion5Answer());
			default:
				return array();
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
     * Set question_1_value
     *
     * @param integer $question1Value
     */
    public function setQuestion1Value($question1Value)
    {
        $this->question_1_value = $question1Value;
    }

    /**
     * Get question_1_value
     *
     * @return integer 
     */
    public function getQuestion1Value()
    {
        return $this->question_1_value;
    }

    /**
     * Set question_1_text
     *
     * @param string $question1Text
     */
    public function setQuestion1Text($question1Text)
    {
        $this->question_1_text = $question1Text;
    }

    /**
     * Get question_1_text
     *
     * @return string 
     */
    public function getQuestion1Text()
    {
        return $this->question_1_text;
    }

    /**
     * Set question_1_answer
     *
     * @param string $question1Answer
     */
    public function setQuestion1Answer($question1Answer)
    {
        $this->question_1_answer = $question1Answer;
    }

    /**
     * Get question_1_answer
     *
     * @return string 
     */
    public function getQuestion1Answer()
    {
        return $this->question_1_answer;
    }

    /**
     * Set question_2_value
     *
     * @param integer $question2Value
     */
    public function setQuestion2Value($question2Value)
    {
        $this->question_2_value = $question2Value;
    }

    /**
     * Get question_2_value
     *
     * @return integer 
     */
    public function getQuestion2Value()
    {
        return $this->question_2_value;
    }

    /**
     * Set question_2_text
     *
     * @param string $question2Text
     */
    public function setQuestion2Text($question2Text)
    {
        $this->question_2_text = $question2Text;
    }

    /**
     * Get question_2_text
     *
     * @return string 
     */
    public function getQuestion2Text()
    {
        return $this->question_2_text;
    }

    /**
     * Set question_2_answer
     *
     * @param string $question2Answer
     */
    public function setQuestion2Answer($question2Answer)
    {
        $this->question_2_answer = $question2Answer;
    }

    /**
     * Get question_2_answer
     *
     * @return string 
     */
    public function getQuestion2Answer()
    {
        return $this->question_2_answer;
    }

    /**
     * Set question_3_value
     *
     * @param integer $question3Value
     */
    public function setQuestion3Value($question3Value)
    {
        $this->question_3_value = $question3Value;
    }

    /**
     * Get question_3_value
     *
     * @return integer 
     */
    public function getQuestion3Value()
    {
        return $this->question_3_value;
    }

    /**
     * Set question_3_text
     *
     * @param string $question3Text
     */
    public function setQuestion3Text($question3Text)
    {
        $this->question_3_text = $question3Text;
    }

    /**
     * Get question_3_text
     *
     * @return string 
     */
    public function getQuestion3Text()
    {
        return $this->question_3_text;
    }

    /**
     * Set question_3_answer
     *
     * @param string $question3Answer
     */
    public function setQuestion3Answer($question3Answer)
    {
        $this->question_3_answer = $question3Answer;
    }

    /**
     * Get question_3_answer
     *
     * @return string 
     */
    public function getQuestion3Answer()
    {
        return $this->question_3_answer;
    }

    /**
     * Set question_4_value
     *
     * @param integer $question4Value
     */
    public function setQuestion4Value($question4Value)
    {
        $this->question_4_value = $question4Value;
    }

    /**
     * Get question_4_value
     *
     * @return integer 
     */
    public function getQuestion4Value()
    {
        return $this->question_4_value;
    }

    /**
     * Set question_4_text
     *
     * @param string $question4Text
     */
    public function setQuestion4Text($question4Text)
    {
        $this->question_4_text = $question4Text;
    }

    /**
     * Get question_4_text
     *
     * @return string 
     */
    public function getQuestion4Text()
    {
        return $this->question_4_text;
    }

    /**
     * Set question_4_answer
     *
     * @param string $question4Answer
     */
    public function setQuestion4Answer($question4Answer)
    {
        $this->question_4_answer = $question4Answer;
    }

    /**
     * Get question_4_answer
     *
     * @return string 
     */
    public function getQuestion4Answer()
    {
        return $this->question_4_answer;
    }

    /**
     * Set question_5_value
     *
     * @param integer $question5Value
     */
    public function setQuestion5Value($question5Value)
    {
        $this->question_5_value = $question5Value;
    }

    /**
     * Get question_5_value
     *
     * @return integer 
     */
    public function getQuestion5Value()
    {
        return $this->question_5_value;
    }

    /**
     * Set question_5_text
     *
     * @param string $question5Text
     */
    public function setQuestion5Text($question5Text)
    {
        $this->question_5_text = $question5Text;
    }

    /**
     * Get question_5_text
     *
     * @return string 
     */
    public function getQuestion5Text()
    {
        return $this->question_5_text;
    }

    /**
     * Set question_5_answer
     *
     * @param string $question5Answer
     */
    public function setQuestion5Answer($question5Answer)
    {
        $this->question_5_answer = $question5Answer;
    }

    /**
     * Get question_5_answer
     *
     * @return string 
     */
    public function getQuestion5Answer()
    {
        return $this->question_5_answer;
    }
}