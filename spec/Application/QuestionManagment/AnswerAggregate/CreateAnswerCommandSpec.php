<?php

namespace spec\App\Application\QuestionManagment\AnswerAggregate;

use App\Application\QuestionManagment\AnswerAggregate\CreateAnswerCommand;
use App\Domain\QuestionManagment\QuestionAggregate\Question;
use App\Domain\UserManagement\User;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CreateAnswerCommandSpec extends ObjectBehavior
{
    private $body;
    private $user;
    private $question;

    /**
     * @param User $user
     * @param Question $question
     */
    function let(User $user, Question $question)
    {
        $this->body = 'teste descrição';
        $this->user = $user;
        $this->question = $question;

        $this->beConstructedWith($this->body, $this->user, $this->question);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(CreateAnswerCommand::class);
    }

    function it_has_a_body()
    {
        $this->body()->shouldBe($this->body);
    }

    function it_has_a_user()
    {
        $this->user()->shouldBe($this->user);
    }

    function it_has_a_question()
    {
        $this->question()->shouldBe($this->question);
    }
}