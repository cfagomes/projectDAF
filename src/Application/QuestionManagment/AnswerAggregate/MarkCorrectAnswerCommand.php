<?php
/**
 * Created by PhpStorm.
 * User: carinagomes
 * Date: 31/12/2018
 * Time: 17:45
 */

namespace App\Application\QuestionManagment\AnswerAggregate;


use App\Domain\QuestionManagment\AnswerAggregate\AnswerId;
use phpDocumentor\Reflection\Types\Boolean;

class MarkCorrectAnswerCommand
{
    private $correctAnswer;
    private $answerId;


    public function __construct(AnswerId $answerId, Boolean $correctAnswer)
    {
        $this->answerId = $answerId;
        $this->correctAnswer = $correctAnswer;
    }


    public function answerId()
    {
        return $this->answerId;
    }


    public function correctAnswer()
    {
        return $this->correctAnswer;
    }

}