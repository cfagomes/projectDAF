<?php

namespace spec\App\Domain\QuestionManagment\AnswerAggregate;

use App\Domain\QuestionManagment\AnswerAggregate\Answer;
use App\Domain\QuestionManagment\AnswerAggregate\AnswerId;
use App\Domain\QuestionManagment\AnswerAggregate\Vote;
use App\Domain\QuestionManagment\QuestionAggregate\Question;
use App\Domain\UserManagement\User;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AnswerSpec extends ObjectBehavior
{
    //private $answerId;

    private $body;

    private $datePublished;

    private $user;

    private $question;

    private $correctAnswer;

    private $positiveVotes;

    private $negativeVotes;

    /**
     * @param User $user
     * @param Question $question
     */
    function let(User $user, Question $question)
    {
       // $this->answerId = '2';
        $this->body = 'Example answer';
        $this->datePublished = '2018-09-18';
        $this->user = $user;
        $this->question = $question;
        $this->positiveVotes = 0;
        $this->negativeVotes = 0;
        $this->correctAnswer = false;
       // $this->votes = $votes;
        $this->beConstructedWith($this->body, $this->user, $this->question);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Answer::class);
    }

    function it_has_an_answer_id()
    {
        $this->answerId()->shouldBeAnInstanceOf(AnswerId::class);
    }

    function it_has_a_question()
    {
        $this->question()->shouldBe($this->question);
    }

    function it_has_a_user()
    {
        $this->user()->shouldBe($this->user);
    }

    function it_has_a_body()
    {
        $this->body()->shouldBe($this->body);
    }

    function it_has_a_date()
    {
        $this->datePublished()->shouldBeAnInstanceOf(\DateTimeImmutable::class);
    }

    function it_can_have_a_correct_answer()
    {
        $this->correctAnswer()->shouldBe($this->correctAnswer);
    }

    function it_is_the_correct_answer()
    {
        $this->setAsCorrect()->shouldBe(true);
    }

    function it_can_add_a_positive_vote()
    {
        $positiveVote=$this->positiveVotes();
        $this->addPositiveVotes(Vote::positive())->shouldBe($positiveVote->getWrappedObject()+1);
    }

    function it_can_add_a_negative_vote()
    {
        $negativeVote=$this->negativeVotes();
        $this->addNegativeVotes(Vote::negative())->shouldBe($negativeVote->getWrappedObject()+1);
    }

    function it_can_update_its_body()
    {
        $body = 'Body answer  edited';

        $this->updateBody($body)->shouldBe($this->getWrappedObject());

        $this->body()->shouldBe($body);
    }

    function it_can_be_converted_to_json()
    {
        $this->shouldBeAnInstanceOf(\JsonSerializable::class);
        $this->jsonSerialize()->shouldBe([
            'answerId' => $this->answerId(),
            'body' => $this->body,
            'datePublished' => $this->datePublished(),
            'question' => $this->question
        ]);
    }
}
