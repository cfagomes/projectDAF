<?php

/**
 * This file is part of S4Skeleton project
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Application\QuestionManagment\AnswerAggregate;

use App\Domain\QuestionManagment\QuestionAggregate\Question;
use App\Domain\UserManagement\User;

/**
 * CreateAnswerCommand
 *
 * @package App\Application\QuestionManagment\AnswerAggregate
 */
final class CreateAnswerCommand
{

    /**
     * @var string|null
     */
    private $body;

    /**
     * @var string
     */
    private $user;

    /**
      * @var string
      */
    private $question;

    /**
     * Question constructor.
     * @param String $body
     * @param User $user
     * @param Question $question
     */
    public function __construct(String $body, User $user, Question $question)
    {
        $this->body = $body;
        $this->user = $user;
        $this->question = $question;

    }

    public function body(): string
    {
        return $this->body;
    }

    /**
     * @return User
     */
    public function user(): User
    {
        return $this->user;
    }

    /**
     * @return Question
     */
    public function question(): Question
    {
        return $this->question;
    }

}


