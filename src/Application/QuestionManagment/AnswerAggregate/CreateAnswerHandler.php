<?php

/**
 * This file is part of S4Skeleton project
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Application\QuestionManagment\AnswerAggregate;

use App\Domain\QuestionManagment\AnswerAggregate\Answer;
use App\Domain\QuestionManagment\AnswersRepository;

/**
 * CreateAnswerHandler
 *
 * @package App\Application\QuestionManagment\QuestionAggregate
 */
final class CreateAnswerHandler
{
    /**
     * @var AnswersRepository
     */
    private $answersRepository;

    /**
     * Creates a CreateUserHandler
     *
     * @param AnswersRepository $answersRepository
     */
    public function __construct(AnswersRepository $answersRepository)
    {
        $this->answersRepository = $answersRepository;
    }

    /**
     * @param CreateAnswerCommand $command
     * @return Answer
     * @throws \Exception
     */
    public function handle(CreateAnswerCommand $command):Answer
    {
        $answer = new Answer($command->body(), $command->user(), $command->question());
        return $this->answersRepository->add($answer);
    }
}

