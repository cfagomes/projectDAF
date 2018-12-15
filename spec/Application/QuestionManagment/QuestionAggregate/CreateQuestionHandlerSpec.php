<?php

namespace spec\App\Application\QuestionManagment\QuestionAggregate;

use App\Application\QuestionManagment\QuestionAggregate\CreateQuestionCommand;
use App\Application\QuestionManagment\QuestionAggregate\CreateQuestionHandler;
use App\Domain\QuestionManagment\QuestionAggregate\Question;
use App\Domain\QuestionManagment\QuestionAggregate\QuestionId;
use App\Domain\QuestionManagment\QuestionsRepository;
use App\Domain\UserManagement\User;
use PhpSpec\ObjectBehavior;
use PhpSpec\Wrapper\Collaborator;
use Prophecy\Argument;

class CreateQuestionHandlerSpec extends ObjectBehavior
{
    function let(QuestionsRepository $repository)
    {
        $repository->add(Argument::type(Question::class))->willReturnArgument(0);
        $this->beConstructedWith($repository);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(CreateQuestionHandler::class);
    }

    /**
     * @param QuestionsRepository $repository
     * @param User|Collaborator $user
     * @throws \Exception
     */
    function it_handles_the_create_question_command(QuestionsRepository $repository, User $user)
    {
        $title = 'title';
        $body = 'body';
        $command = new CreateQuestionCommand($title, $body, $user->getWrappedObject());

        $question = $this->handle($command);
        $question->shouldBeAnInstanceOf(Question::class);
        $repository->add($question)->shouldHaveBeenCalled();
    }
}
