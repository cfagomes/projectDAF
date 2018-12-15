<?php

/**
 * This file is part of S4Skeleton project
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Application\QuestionManagment\QuestionAggregate;

use App\Domain\QuestionManagment\QuestionAggregate\QuestionId;
use App\Domain\UserManagement\OAuth2\Scope;
use App\Domain\UserManagement\User;
use DateTimeImmutable;

/**
 * CreateQuestionCommand
 *
 * @package App\Application\QuestionManagment\QuestionAggregate
 */
final class CreateQuestionCommand
{
   /* /**
     * @var string
     */
   /* private $questionId;*/

    /**
     * @var string
     */
    private $title;

    /**
     * @var string|null
     */
    private $body;

    /**
     * @var string
     */
    private $user;

    /**
     * Question constructor.
     * @param String $title
     * @param String $body
     * @param User $user
     */
    public function __construct(String $title, String $body, User $user)
    {
        $this->title = $title;
        $this->body = $body;
        $this->user = $user;
    }

    public function title(): string
    {
        return $this->title;
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
}

