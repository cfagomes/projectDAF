<?php

/**
 * This file is part of S4Skeleton project
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Domain\QuestionManagment\QuestionAggregate;

use App\Domain\QuestionManagment\AnswerAggregate\Answer;
use App\Domain\UserManagement\User;
use DateTimeImmutable;
use JsonSerializable;
use Doctrine\ORM\Mapping as ORM;
use League\OAuth2\Server\Entities\UserEntityInterface;

/**
 * Question
 *
 * @package App\Domain\QuestionManagment\QuestionAggregate
 *
 * @ORM\Entity()
 * @ORM\Table(name="questions")
 * @IgnoreAnnotation("OA\Schema")
 * @IgnoreAnnotation("OA\Property")
 *
 * @OA\Schema(
 *     description="Question",
 *     title="Question"
 * )
 */
class Question implements JsonSerializable
{
    /**
     * @var string
     *
     * @ORM\Id()
     * @ORM\Column(type="QuestionId", name="id")
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $questionId;

    /**
     * @var string
     *
     * @ORM\Column()
     */
    private $title;

    /**
     * @var string|null
     *
     * @ORM\Column()
     */
    private $body;

    /**
     * @var DateTimeImmutable
     *
     * @ORM\Column(type="date")
     */
    private $datePublished;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="App\Domain\UserManagement\User")
     */
    private $user;

    /**
     * @var array
     */
    private $answer;

    /**
     * @var array
     */
    private $tag;

    /**
     * Question constructor.
     * @param string $title
     * @param string $body
     * @param User $user
     * @param array $answer
     * @param array $tag
     * @throws \Exception
     */
    public function __construct(string $title, string $body, User $user, Array $answer = [], Array $tag = [])
    {
        $this->questionId = new QuestionId();
        $this->title = $title;
        $this->body = $body;
        $this->datePublished = new DateTimeImmutable();
        $this->user = $user;
        $this->answer = $answer;
        $this->tag = $tag;
    }

    /**
     * Question's internal ID
     *
     * @return QuestionId
     */
    public function questionId(): QuestionId
    {
        return $this->questionId;
    }

    public function title(): string
    {
        return $this->title;
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
     * @return array
     */
    public function answer()
    {
        return $this->answer;
    }

    public function addAnswer($answer) : array
    {
        array_push($this->answer, $answer);
        return $this->answer;
    }

    public function removeAnswer($answer) : array
    {
        $index = array_search($answer, $this->answer); //search index in the array
        unset($this->answer[$index]);
        return $this->answer;
    }

    public function correctAnswer()
    {
        foreach ($this->answer as $key => $value){
            if ($value->correctAnswer())
                return $value;
        }

        return false;
    }

    //can or cannot have object tag
    /**
     * @return array
     */
    public function tag()
    {
        return $this->tag;
    }


    public function addTag($tag) : array
    {
        array_push($this->tag, $tag);
        return $this->tag;
    }

    /**
     * Updates question's title and/or body
     *
     * @param string $title
     * @param string $body
     *
     * @return Question
     */
    public function updateTitleBody(string $title, string $body): Question
    {
        $this->title = $title;
        $this->body = $body;
        return $this;
    }

    /**
     * Return the user's identifier.
     *
     * @return mixed
     */
    public function getIdentifier()
    {
        return $this->questionId;
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
            'questionId' => $this->questionId,
            'title' => $this->title,
            'body' => $this->body,
            'user' => $this->user,
            'answer' => $this->answer
        ];
    }
}