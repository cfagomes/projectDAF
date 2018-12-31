<?php
/**
 * Created by PhpStorm.
 * User: carinagomes
 * Date: 31/12/2018
 * Time: 17:11
 */

namespace App\Application\QuestionManagment\AnswerAggregate;


use App\Domain\QuestionManagment\AnswerAggregate\AnswerId;

class UpdateAnswerCommand
{
    private $body;

    private $answerId;


    public function __construct(AnswerId $answerId, String $body)
    {
        $this->answerId = $answerId;
        $this->body = $body;
    }


    public function answerId()
    {
        return $this->answerId;
    }


    public function body()
    {
        return $this->body;
    }

}