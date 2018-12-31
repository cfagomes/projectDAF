<?php
/**
 * Created by PhpStorm.
 * User: carinagomes
 * Date: 31/12/2018
 * Time: 17:36
 */

namespace App\Application\QuestionManagment\AnswerAggregate;


use App\Domain\Exception\SpecificationFailureException;
use App\Domain\QuestionManagment\AnswerAggregate\Answer;
use App\Domain\QuestionManagment\AnswersRepository;

class MarkCorrectAnswerHandler
{
    private $answerRepository;


    public function __construct(AnswersRepository $answerRepository)
    {
        $this->answerRepository = $answerRepository;
      //  $this->isQuestionOwner = $isQuestionOwner;
      //  $this->oneCorrectAnswerPQuestion = $oneCorrectAnswerPQuestion;
    }

    /**
     * @param MarkCorrectAnswerCommand $command
     * @return Answer
     */
    public function handler(MarkCorrectAnswerCommand $command): Answer
    {
        $answer = $this->answerRepository->withAnswerId($command->answerId());

     /*   if (!$this->isQuestionOwner->isSatisfiedBy($answer->question())) {
            throw new SpecificationFailureException(
                "This user is not the owner's question."
            );
        }

        if (!$this->oneCorrectAnswerPQuestion->isSatisfiedBy($answer)) {
            throw new SpecificationFailureException(
                  "Is not possible to mark the question as correct."
            );
        }   */
        $answer->correctAnswer();
        return $this->answerRepository->update($answer);
    }
}