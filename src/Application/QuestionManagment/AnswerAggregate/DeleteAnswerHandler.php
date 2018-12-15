<?php

/**
 * This file is part of S4Skeleton project
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Application\QuestionManagment\AnswerAggregate;

use App\Domain\QuestionManagment\AnswersRepository;

/**
 * DeleteAnswerHandler
 *
 * @package App\Application\QuestionManagment\AnswerAggregate
 */
final class DeleteAnswerHandler
{
    /**
     * @var AnswersRepository
     */
    private $answersRepository;

    /**
     * Creates a DeleteAnswerHandler
     *
     * @param AnswersRepository $answersRepository
     */
    public function __construct(AnswersRepository $answersRepository)
    {
        $this->answersRepository = $answersRepository;
    }

    public function handle(DeleteAnswerCommand $command): void
    {
        $answer = $this->answersRepository->withAnswerId($command->answerId());
        $this->answersRepository->remove($answer);
    }
}
