<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Answers")
 */

class Answers{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=40)
     */
    protected $answer;

    /**
     * @ORM\Column(type="string", length=5)
     */
    protected $right_ans;

    public function getAnswerId()
    {
        return $this->id;
    }

    public function setAnswer($answer)
    {
        $this->answer = $answer;
        return $this;
    }

    public function getAnswer()
    {
        return $this->answer;
    }

    public function setRightAns($right_ans)
    {
        $this->right_ans = $right_ans;
        return $this;
    }

    public function getRightAns()
    {
        return $this->right_ans;
    }
}
