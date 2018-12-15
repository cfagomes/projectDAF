<?php

namespace spec\App\Domain\QuestionManagment\AnswerAggregate;

use App\Domain\QuestionManagment\AnswerAggregate\Vote;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class VoteSpec extends ObjectBehavior
{
    private $vote;

    function let()
    {
        $this->vote = false;
        $this->beConstructedThrough('negative');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Vote::class);
    }

  /*  function it_has_a_vote()
    {
        $this->vote()->shouldBe($this->vote);
    }*/

    function it_has_a_positive_vote()
    {
        $this->beConstructedThrough('positive', []);
        $this->isPositive()->shouldBe(true);
    }

    function it_has_a_negative_vote()
    {
        $this->beConstructedThrough('negative', []);
        $this->isNegative()->shouldBe(false);
    }

    function it_can_be_converted_to_json()
    {
        $this->shouldBeAnInstanceOf(\JsonSerializable::class);
        $this->jsonSerialize()->shouldBe([
            'vote' => $this->vote
        ]);
    }
}

