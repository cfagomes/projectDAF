<?php

namespace spec\App\Application\QuestionManagment\QuestionAggregate;

use App\Application\QuestionManagment\QuestionAggregate\DeleteQuestionCommand;
use App\Application\QuestionManagment\QuestionAggregate\DeleteQuestionHandler;
use App\Domain\QuestionManagment\QuestionAggregate\Question;
use App\Domain\QuestionManagment\QuestionAggregate\QuestionId;
use App\Domain\QuestionManagment\QuestionsRepository;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DeleteQuestionHandlerSpec extends ObjectBehavior
{
    private $questionId;

    /**
     * @param QuestionsRepository $repository
     * @param Question $question
     * @throws \Exception
     */
    function let(
        QuestionsRepository $repository,
        Question $question
    ) {
        $this->questionId = new QuestionId();
        $repository->withQuestionId($this->questionId)->willReturn($question);

        $this->beConstructedWith($repository);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(DeleteQuestionHandler::class);
    }

    function it_handles_delete_question_command(
        QuestionsRepository $repository,
        Question $question
    ) {
        $command = new DeleteQuestionCommand($this->questionId);
        $repository->remove($question)->shouldBeCalled();

        $this->handle($command);
    }
}
