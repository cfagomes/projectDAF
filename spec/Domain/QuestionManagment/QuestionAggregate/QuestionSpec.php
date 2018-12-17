<?php

namespace spec\App\Domain\QuestionManagment\QuestionAggregate;

use App\Domain\QuestionManagment\AnswerAggregate\Answer;
use App\Domain\QuestionManagment\QuestionAggregate\Question;
use App\Domain\QuestionManagment\QuestionAggregate\QuestionId;
use App\Domain\QuestionManagment\QuestionAggregate\Tag;
use App\Domain\UserManagement\User;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class QuestionSpec extends ObjectBehavior
{
   // private $questionId;

    private $title;

    private $body;

    private $user;

    private $answer;

    private $tag;

    function let(User $user)
    {
       // $this->questionId = '1';
        $this->title = 'Example';
        $this->body = 'Lorem ipsum';
        $this->user = $user;
        $this->answer = [];
        $this->tag = [];
        $this->beConstructedWith($this->title, $this->body, $this->user);
    }


    function it_is_initializable()
    {
        $this->shouldHaveType(Question::class);
    }

    function it_has_a_question_id()
    {
        $this->questionId()->shouldBeAnInstanceOf(QuestionId::class);
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

    function it_has_a_date()
    {
        $this->datePublished()->shouldBeAnInstanceOf(\DateTimeImmutable::class);
    }

    function it_can_add_an_answer(Answer $answer)
    {
        $arrayAnswers = $this->answer()->getWrappedObject();  //unzip answers XD
        $newArrayAnswers = $this->addAnswer($answer); //add answer
        $newArrayAnswers->shouldBeArray(); //verify if its an array
        $newArrayAnswers->shouldHaveCount(count($arrayAnswers)+1); //verify if new array have one more array than arrayanswers
        $newArrayAnswers[count($newArrayAnswers->getWrappedObject())-1]->shouldBe($answer); //verify if the last array is in the last position
    }

    function it_has_answers()
    {
        $this->answer()->shouldBe($this->answer);
    }

    function it_can_remove_an_answer(Answer $answer)
    {
        $this->addAnswer($answer);
        $arrayAnswers = $this->answer()->getWrappedObject();
        $newArrayAnswers = $this->removeAnswer($answer);
        $newArrayAnswers->shouldBeArray(); //verify if its an array
        $newArrayAnswers->shouldNotBe(array_search($answer, $newArrayAnswers->getWrappedObject())); //verify if the answer is not in the array
        $newArrayAnswers->shouldHaveCount(count($arrayAnswers)-1);
    }

    /**
     * @param User $user
     * @param Question $question
     * @throws \Exception
     */
    function it_has_a_correct_answer(User $user, Question $question)
    {
        $body='body';
        $user=$user->getWrappedObject();
        $question=$question->getWrappedObject();
        $answer= new Answer($body, $user, $question,true);
        $this->addAnswer($answer);
        //$arrayAnswers = $this->answer()->getWrappedObject();
        $correctAnswer = $this->correctAnswer($answer); //method of class 'correctAnswer'
        $correctAnswer->correctAnswer()->shouldBe(true);

    }

    function it_has_tags()
    {
        $this->tag()->shouldBe($this->tag);
    }

    function it_can_add_a_tag(Tag $tag)
    {
        $arrayTags = $this->tag()->getWrappedObject();
        $newArrayTags = $this->addTag($tag);
        $newArrayTags->shouldBeArray();
        $newArrayTags->shouldHaveCount(count($arrayTags) + 1);
        $newArrayTags[count($newArrayTags->getWrappedObject()) - 1]->shouldBe($tag);
    }

    function it_can_update_its_title_and_body()
    {
        $title = 'Question edited';
        $body = 'Body question edited';

        $this->updateTitleBody($title, $body)->shouldBe($this->getWrappedObject());

        $this->title()->shouldBe($title);
        $this->body()->shouldBe($body);
    }

    function it_can_be_converted_to_json()
    {
        $this->shouldBeAnInstanceOf(\JsonSerializable::class);
        $this->jsonSerialize()->shouldBe([
            'questionId' => $this->questionId(),
            'title' => $this->title,
            'body' => $this->body,
            'user' => $this->user,
            'answer' => $this->answer
        ]);
    }
}
