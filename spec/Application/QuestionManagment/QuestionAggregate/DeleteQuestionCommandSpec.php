<?php

namespace spec\App\Application\QuestionManagment\QuestionAggregate;

use App\Application\QuestionManagment\QuestionAggregate\DeleteQuestionCommand;
use App\Domain\QuestionManagment\QuestionAggregate\QuestionId;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DeleteQuestionCommandSpec extends ObjectBehavior
{
    private $questionId;

    /**
     * @throws \Exception
     */
    function let()
    {
        $this->questionId = new QuestionId();
        $this->beConstructedWith($this->questionId);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(DeleteQuestionCommand::class);
    }

    function it_has_a_questionId()
    {
        $this->questionId()->shouldBe($this->questionId);
    }
}