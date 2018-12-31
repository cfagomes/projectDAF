<?php
/**
 * Created by PhpStorm.
 * User: carinagomes
 * Date: 31/12/2018
 * Time: 17:23
 */

namespace App\Application\QuestionManagment\QuestionAggregate;


use App\Domain\QuestionManagment\QuestionsRepository;

class UpdateQuestionHandler
{
    private $questionRepository;
    /**
     * UpdateQuestionHandler constructor.
     * @param $questionRepository
     */
    public function __construct(QuestionsRepository $questionRepository)
    {
        $this->questionRepository = $questionRepository;
    }
    public function handler(UpdateQuestionCommand $command)
    {
        $question = $this->questionRepository->withQuestionId($command->getQuestionId());
        $question->updateTitleBody($command->getTitle(),$command->getBody());
        $this->questionRepository->update($question);
    }
}