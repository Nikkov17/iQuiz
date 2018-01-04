<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Codes")
 */

class Codes{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="integer")
     */
    protected $answer_id;

    /**
     * @ORM\Column(type="integer")
     */
    protected $question_id;

    public function setAnswerId($answer_id)
    {
        $this->answer_id = $answer_id;
        return $this;
    }

    public function getAnswerId()
    {
        return $this->answer_id;
    }

    public function setQuestionId($question_id)
    {
        $this->question_id = $question_id;
        return $this;
    }

    public function getQuestionId()
    {
        return $this->question_id;
    }

}