<?php
/**
 * Created by PhpStorm.
 * User: carinagomes
 * Date: 31/12/2018
 * Time: 19:20
 */

namespace App\Application\QuestionManagment\AnswerAggregate;


use App\Domain\QuestionManagment\AnswersRepository;

class VoteAnswerHandler
{
    private $answerRepository;


    public function __construct(AnswersRepository $answerRepository)
    {
        $this->answerRepository = $answerRepository;
    }
    public function handler(VoteAnswerCommand $command)
    {
        $answer= $this->answerRepository->withAnswerId($command->answerId());
        $answer->positiveVotes($command->posVotes());
        $answer->negativeVotes($command->negVotes());
        $this->answerRepository->update($answer);
    }
}