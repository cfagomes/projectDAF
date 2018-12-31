<?php
/**
 * Created by PhpStorm.
 * User: carinagomes
 * Date: 31/12/2018
 * Time: 17:12
 */

namespace App\Application\QuestionManagment\AnswerAggregate;


use App\Domain\QuestionManagment\AnswersRepository;

class UpdateAnswerHandler
{
    private $answerRepository;


    public function __construct(AnswersRepository $answerRepository)
    {
        $this->answerRepository = $answerRepository;
    }
    public function handler(UpdateAnswerCommand $command)
    {
        $answer= $this->answerRepository->withAnswerId($command->answerId());
        $answer->updateBody($command->body());
        $this->answerRepository->update($answer);
    }
}