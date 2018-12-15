<?php

namespace spec\App\Application\QuestionManagment\AnswerAggregate;

use App\Application\QuestionManagment\AnswerAggregate\CreateAnswerCommand;
use App\Application\QuestionManagment\AnswerAggregate\CreateAnswerHandler;
use App\Domain\QuestionManagment\AnswerAggregate\Answer;
use App\Domain\QuestionManagment\AnswersRepository;
use App\Domain\QuestionManagment\QuestionAggregate\Question;
use App\Domain\UserManagement\User;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CreateAnswerHandlerSpec extends ObjectBehavior
{
    function let(AnswersRepository $repository)
    {
        $repository->add(Argument::type(Answer::class))->willReturnArgument(0);
        $this->beConstructedWith($repository);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(CreateAnswerHandler::class);
    }

    /**
     * @param AnswersRepository $repository
     * @param User|Collaborator $user
     * @param Question|Collaborator $question
     */
    function it_handles_the_create_question_command(AnswersRepository $repository, User $user, Question $question)
    {
        $body = 'body';
        $command = new CreateAnswerCommand($body, $user->getWrappedObject(), $question->getWrappedObject());

        $question = $this->handle($command);
        $question->shouldBeAnInstanceOf(Answer::class);
        $repository->add($question)->shouldHaveBeenCalled();
    }
}
