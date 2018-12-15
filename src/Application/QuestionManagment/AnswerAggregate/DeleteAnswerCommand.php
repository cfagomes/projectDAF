<?php

/**
 * This file is part of S4Skeleton project
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Application\QuestionManagment\AnswerAggregate;

use App\Domain\QuestionManagment\AnswerAggregate\AnswerId;

/**
 * DeleteAnswerCommand
 *
 * @package App\Application\QuestionManagment\AnswerAggregate
 */
final class DeleteAnswerCommand
{
    /**
     * @var AnswerId
     */
    private $answerId;

    /**
     * Creates a DeleteAnswerCommand
     *
     * @param AnswerId $answerId
     */
    public function __construct(AnswerId $answerId)
    {
        $this->answerId = $answerId;
    }

    public function answerId(): AnswerId
    {
        return $this->answerId;
    }
}
