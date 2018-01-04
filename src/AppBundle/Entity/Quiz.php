<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Quiz")
 */

class Quiz
{

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string",length=45)
     */
    protected $quiz;

    /**
     * @ORM\Column(type="integer")
     */
    protected $question_1;

    /**
     * @ORM\Column(type="integer")
     */
    protected $question_2;

    /**
     * @ORM\Column(type="integer")
     */
    protected $question_3;

    /**
     * @ORM\Column(type="integer")
     */
    protected $question_4;

    /**
     * @ORM\Column(type="integer")
     */
    protected $question_5;

    /**
     * @ORM\Column(type="integer")
     */
    protected $question_6;

    /**
     * @ORM\Column(type="integer")
     */
    protected $question_7;

    /**
     * @ORM\Column(type="integer")
     */
    protected $question_8;

    /**
     * @ORM\Column(type="integer")
     */
    protected $question_9;

    /**
     * @ORM\Column(type="integer")
     */
    protected $question_10;

    public function getId()
    {
        return $this->id;
    }

    public function setQuiz($quiz)
    {
        $this->quiz = $quiz;
        return $this;
    }

    public function getQuiz()
    {
        return $this->quiz;
    }

    public function setQuestion1($question_1)
    {
        $this->question_1 = $question_1;
        return $this;
    }

    public function getQuestion1()
    {
        return $this->question_1;
    }

    public function setQuestion2($question_2)
    {
        $this->question_2 = $question_2;
        return $this;
    }

    public function getQuestion2()
    {
        return $this->question_2;
    }

    public function setQuestion3($question_3)
    {
        $this->question_3 = $question_3;
        return $this;
    }

    public function getQuestion3()
    {
        return $this->question_3;
    }

    public function setQuestion4($question_4)
    {
        $this->question_4 = $question_4;
        return $this;
    }

    public function getQuestion4()
    {
        return $this->question_4;
    }

    public function setQuestion5($question_5)
    {
        $this->question_5 = $question_5;
        return $this;
    }

    public function getQuestion5()
    {
        return $this->question_5;
    }

    public function setQuestion6($question_6)
    {
        $this->question_6 = $question_6;
        return $this;
    }

    public function getQuestion6()
    {
        return $this->question_6;
    }

    public function setQuestion7($question_7)
    {
        $this->question_7 = $question_7;
        return $this;
    }

    public function getQuestion7()
    {
        return $this->question_7;
    }

    public function setQuestion8($question_8)
    {
        $this->question_8 = $question_8;
        return $this;
    }

    public function getQuestion8()
    {
        return $this->question_8;
    }

    public function setQuestion9($question_9)
    {
        $this->question_9 = $question_9;
        return $this;
    }

    public function getQuestion9()
    {
        return $this->question_9;
    }

    public function setQuestion10($question_10)
    {
        $this->question_10 = $question_10;
        return $this;
    }

    public function getQuestion10()
    {
        return $this->question_10;
    }
}