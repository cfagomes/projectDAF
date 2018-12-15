<?php

namespace spec\App\Domain\QuestionManagment\QuestionAggregate;

use App\Domain\QuestionManagment\QuestionAggregate\Tag;
use App\Domain\QuestionManagment\QuestionAggregate\TagId;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TagSpec extends ObjectBehavior
{
 //   private $tagId;

    private $description;


    function let()
    {
       // $this->tagId = '1';
        $this->description = 'Example tag';
        $this->beConstructedWith($this->description);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Tag::class);
    }

    function it_has_a_tag_id()
    {
        $this->tagId()->shouldBeAnInstanceOf(TagId::class);
    }

    function it_has_a_description()
    {
        $this->description()->shouldBe($this->description);
    }

    function it_can_be_converted_to_json()
    {
        $this->shouldBeAnInstanceOf(\JsonSerializable::class);
        $this->jsonSerialize()->shouldBe([
            'tagId' => $this->tagId(),
            'description' => $this->description,
        ]);
    }
}
