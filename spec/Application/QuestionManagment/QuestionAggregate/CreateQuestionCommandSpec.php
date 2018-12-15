<?php

namespace spec\App\Application\QuestionManagment\QuestionAggregate;

use App\Application\QuestionManagment\QuestionAggregate\CreateQuestionCommand;
use App\Domain\QuestionManagment\QuestionAggregate\QuestionId;
use App\Domain\UserManagement\User;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CreateQuestionCommandSpec extends ObjectBehavior
{
    //private $questionId;
    private $title;
    private $body;
    private $user;

    /**
     * @param User $user
     */
    function let(User $user)
    {
        $this->title ='teste';
        $this->body = 'teste descrição';
        $this->user = $user;

        $this->beConstructedWith($this->title, $this->body, $this->user);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(CreateQuestionCommand::class);
    }

    function it_has_a_title()
    {
        $this->title()->shouldBe($this->title);
    }

    function it_has_a_body()
    {
        $this->body()->shouldBe($this->body);
    }

    function it_has_a_user()
    {
        $this->user()->shouldBe($this->user);
    }
}