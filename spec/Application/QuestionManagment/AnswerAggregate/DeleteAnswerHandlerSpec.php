<?php

namespace spec\App\Application\QuestionManagment\AnswerAggregate;

use App\Application\QuestionManagment\AnswerAggregate\DeleteAnswerHandler;
use App\Application\QuestionManagment\AnswerAggregate\DeleteAnswerCommand;
use App\Domain\QuestionManagment\AnswerAggregate\Answer;
use App\Domain\QuestionManagment\AnswerAggregate\AnswerId;
use App\Domain\QuestionManagment\AnswersRepository;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DeleteAnswerHandlerSpec extends ObjectBehavior
{
    private $answerId;

    /**
     * @param AnswersRepository $repository
     * @param Answer $answer
     * @throws \Exception
     */
    function let(
        AnswersRepository $repository,
        Answer $answer
    ) {
        $this->answerId = new AnswerId();
        $repository->withAnswerId($this->answerId)->willReturn($answer);

        $this->beConstructedWith($repository);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(DeleteAnswerHandler::class);
    }

    function it_handles_delete_answer_command(
        AnswersRepository $repository,
        Answer $answer
    ) {
        $command = new DeleteAnswerCommand($this->answerId);
        $repository->remove($answer)->shouldBeCalled();

        $this->handle($command);
    }
}

