<?php

/**
 * This file is part of S4Skeleton project
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Domain\QuestionManagment;

use App\Domain\QuestionManagment\AnswerAggregate\Answer;
use App\Domain\QuestionManagment\AnswerAggregate\AnswerId;
use League\OAuth2\Server\Repositories\UserRepositoryInterface;

/**
 * Questions Repository
 *
 * @package App\Domain\QuestionManagement\QuestionAggregate
 */
interface AnswersRepository
{
    /**
     * Adds an answer to the repository
     *
     * @param Answer $answer
     * @return Answer
     */
    public function add(Answer $answer): Answer;

    /**
     * Persists answer changes
     *
     * @param Answer $answer
     * @return Answer
     */
    public function update(Answer $answer): Answer;

    /**
     * Removes answer from repository
     *
     * @param Answer $answer
     */
    public function remove(Answer $answer): void;

    /**
     * Retrieves the user with provided userId
     *
     * @param AnswerId $answerId
     * @return Answer
     *
     */
    public function withAnswerId(AnswerId $answerId): Answer;
}
