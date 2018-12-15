<?php

namespace spec\App\Application\QuestionManagment\AnswerAggregate;

use App\Application\QuestionManagment\AnswerAggregate\DeleteAnswerCommand;
use App\Domain\QuestionManagment\AnswerAggregate\AnswerId;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DeleteAnswerCommandSpec extends ObjectBehavior
{
    private $answerId;

    /**
     * @throws \Exception
     */
    function let()
    {
        $this->answerId = new AnswerId();
        $this->beConstructedWith($this->answerId);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(DeleteAnswerCommand::class);
    }

    function it_has_an_answerId()
    {
        $this->answerId()->shouldBe($this->answerId);
    }
}
