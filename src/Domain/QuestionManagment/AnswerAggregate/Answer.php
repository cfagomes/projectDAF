<?php

/**
 * This file is part of S4Skeleton project
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Domain\QuestionManagment\AnswerAggregate;

use App\Domain\QuestionManagment\QuestionAggregate\Question;
use App\Domain\UserManagement\User;
use DateTimeImmutable;
use JsonSerializable;
use Doctrine\ORM\Mapping as ORM;
use League\OAuth2\Server\Entities\UserEntityInterface;

/**
 * Answer
 *
 * @package App\Domain\QuestionManagment\AnswerAggregate
 *
 * @ORM\Entity()
 * @ORM\Table(name="answers")
 * @IgnoreAnnotation("OA\Schema")
 * @IgnoreAnnotation("OA\Property")
 *
 * @OA\Schema(
 *     description="Answer",
 *     title="Answer"
 * )
 */
class Answer implements JsonSerializable
{
    /**
     * @var string
     *
     * @ORM\Id()
     * @ORM\Column(type="AnswerId", name="id")
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $answerId;

    /**
     * @var string
     *
     * @ORM\Column()
     */
    private $body;

    /**
     * @var bool
     *
     * @ORM\Column(type="boolean")
     */
    private $correctAnswer;

    /**
     * @var DateTimeImmutable
     *
     * @ORM\Column(type="date")
     */
    private $datePublished;

    /**
     * @ORM\ManyToOne(targetEntity="App\Domain\UserManagement\User")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Domain\UserManagement\User")
     */
    private $question;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    private $positiveVotes;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    private $negativeVotes;

    /**
     * Answer constructor.
     * @param string $body
     * @param User $user
     * @param Question $question
     * @param bool $correctAnswer
     * @param int $positiveVotes
     * @param int $negativeVotes
     * @throws \Exception
     */
    public function __construct(string $body, User $user, Question $question, bool $correctAnswer = false, int $positiveVotes = 0, int $negativeVotes = 0)

    {
        $this->answerId = new AnswerId();
        $this->body = $body;
        $this->datePublished = new DateTimeImmutable();
        $this->positiveVotes = $positiveVotes;
        $this->negativeVotes = $negativeVotes;
        $this->user = $user;
        $this->question = $question;
        $this->correctAnswer = $correctAnswer;
    }

    /**
     * Answer's internal ID
     *
     * @return AnswerId
     */
    public function answerId(): AnswerId
    {
        return $this->answerId;
    }

    /**
     * Return the user's identifier.
     *
     * @return mixed
     */
    public function getIdentifier()
    {
        return $this->answerId;
    }

    public function body(): string
    {
        return $this->body;
    }

    public function datePublished(): DateTimeImmutable
    {
        return $this->datePublished;
    }

    //object user
    /**
     * @return User
     */
    public function user(): User
    {
        return $this->user;
    }

    //can or cannot have object answer
    /**
     * @return Question
     */
    public function question(): ?Question
    {
        return $this->question;
    }

    /**
     * @return bool
     */
    public function correctAnswer(): bool
    {
        return $this->correctAnswer;
    }

    /**
     * @return bool
     */
    public function setAsCorrect(): bool
    {
       return $this->correctAnswer = true;
    }

    public function positiveVotes()
    {
        return $this->positiveVotes;
    }

    public function addPositiveVotes(Vote $positiveVotes)
    {

        if ($positiveVotes->isPositive()==true)
        {
            $this->positiveVotes += 1;
            return $this->positiveVotes;
        }
    }

    public function negativeVotes()
    {
        return $this->positiveVotes;
    }

    public function addNegativeVotes(Vote $negativeVotes)
    {

        if ($negativeVotes->isNegative()==false)
        {
            $this->positiveVotes += 1;
            return $this->positiveVotes;
        }
    }

    public function updateBody(string $body): Answer
    {
        $this->body = $body;
        return $this;
    }

    /**
     * Specify data which should be serialized to JSON
     * @link https://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        return [
            'answerId' => $this->answerId,
            'body' => $this->body,
            'datePublished' => $this->datePublished,
            'question' => $this->question
        ];
    }
}

