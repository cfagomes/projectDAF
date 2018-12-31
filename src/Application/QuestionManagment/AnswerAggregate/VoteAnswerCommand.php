<?php
/**
 * Created by PhpStorm.
 * User: carinagomes
 * Date: 31/12/2018
 * Time: 19:19
 */

namespace App\Application\QuestionManagment\AnswerAggregate;


use App\Domain\QuestionManagment\AnswerAggregate\AnswerId;
use phpDocumentor\Reflection\Types\Integer;

class VoteAnswerCommand
{
    private $positiveVotes;

    private $negativeVotes;

    private $answerId;


    public function __construct(AnswerId $answerId, Integer $positiveVotes)
    {
        $this->answerId = $answerId;
        $this->positiveVotes = $positiveVotes;
    }


    public function answerId()
    {
        return $this->answerId;
    }

    public function posVotes()
    {
        return $this->positiveVotes;
    }

    public function negVotes()
    {
        return $this->negativeVotes;
    }

}