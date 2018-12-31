<?php

/**
 * This file is part of S4Skeleton project
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Application\QuestionManagment\QuestionAggregate;

use App\Domain\QuestionManagment\QuestionAggregate\Question;
use App\Domain\UserManagement\User;

/**
 * CreateQuestionCommand
 *
 * @package App\Application\QuestionManagment\QuestionAggregate
 */
final class CreateQuestionCommand
{

    /**
     * @var string|null
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

    private $tags;

    /**
     * Question constructor.
     * @param String $title
     * @param String $body
     * @param User $user
     * @param array $tags
     */
    public function __construct(User $user, String $title, String $body, Array $tags = [])
    {
        $this->title = $title;
        $this->body = $body;
        $this->user = $user;
        $this->tags = $tags;

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

    public function tags()
    {
        return $this->tags;
    }

}