<?php

namespace spec\Http;

use Http\Response;
use PhpSpec\ObjectBehavior;

class ResponseSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Response::class);
    }

    function it_returns_content_it_has_been_constructed_with()
    {
        $this->beConstructedWith('Hello there!');

        $this->getContent()->shouldBeEqualTo('Hello there!');
    }

    function it_returns_default_status_code_if_it_has_not_been_specified_in_the_construction()
    {
        $this->getStatusCode()->shouldBeEqualTo(200);
    }

    function it_returns_status_code_it_has_been_constructed_with()
    {
        $this->beConstructedWith(null, 400);

        $this->getStatusCode()->shouldBeEqualTo(400);
    }

    function it_can_be_instantiated_by_a_named_constructor()
    {
        $this::create('Hello', 200)->shouldBeAnInstanceOf(Response::class);
    }
}
