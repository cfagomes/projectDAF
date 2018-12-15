<?php

/**
 * This file is part of S4Skeleton project
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Application\QuestionManagment\QuestionAggregate;

use App\Domain\QuestionManagment\QuestionAggregate\Question;
use App\Domain\QuestionManagment\QuestionsRepository;

/**
 * CreateQuestionHandler
 *
 * @package App\Application\QuestionManagment\QuestionAggregate
 */
final class CreateQuestionHandler
{
    /**
     * @var QuestionsRepository
     */
    private $questionsRepository;

    /**
     * Creates a CreateUserHandler
     *
     * @param QuestionsRepository $questionsRepository
     */
    public function __construct(QuestionsRepository $questionsRepository)
    {
        $this->questionsRepository = $questionsRepository;
    }

    /**
     * @param CreateQuestionCommand $command
     * @return Question
     * @throws \Exception
     */
    public function handle(CreateQuestionCommand $command): Question
    {
        $question = new Question($command->title(), $command->body(), $command->user());
        return $this->questionsRepository->add($question);
    }
}
