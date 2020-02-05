<?php

namespace spec\Http;

use Http\Request;
use PhpSpec\ObjectBehavior;

class RequestSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Request::class);
    }

    function it_returns_parameters_by_key()
    {
        $this->set('name', 'Patrick');

        $this->get('name')->shouldBeEqualTo('Patrick');
    }

    function it_tells_if_has_a_parameter()
    {
        $this->set('username', 'pfazzi');

        $this->has('username')->shouldBe(true);
    }

    function it_throws_an_exception_if_parameter_is_not_set()
    {
        $this
            ->shouldThrow(\InvalidArgumentException::class)
            ->during('get', ['username']);
    }
}
