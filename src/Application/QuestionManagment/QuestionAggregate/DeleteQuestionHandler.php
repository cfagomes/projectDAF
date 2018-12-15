<?php

/**
 * This file is part of S4Skeleton project
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Application\QuestionManagment\QuestionAggregate;

use App\Domain\QuestionManagment\QuestionsRepository;

/**
 * DeleteQuestionHandler
 *
 * @package App\Application\QuestionManagment\QuestionAggregate
 */
final class DeleteQuestionHandler
{
    /**
     * @var QuestionsRepository
     */
    private $questionsRepository;

    /**
     * Creates a DeleteQuestionHandler
     *
     * @param QuestionsRepository $questionsRepository
     */
    public function __construct(QuestionsRepository $questionsRepository)
    {
        $this->questionsRepository = $questionsRepository;
    }

    public function handle(DeleteQuestionCommand $command): void
    {
        $question = $this->questionsRepository->withQuestionId($command->questionId());
        $this->questionsRepository->remove($question);
    }
}
