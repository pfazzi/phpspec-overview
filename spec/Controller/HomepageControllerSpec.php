<?php

namespace spec\Controller;

use Controller\HomepageController;
use Entity\UserInterface;
use Http\Request;
use Http\Response;
use PhpSpec\ObjectBehavior;
use Repository\UserRepositoryInterface;

class HomepageControllerSpec extends ObjectBehavior
{
    function let(UserRepositoryInterface $userRepository)
    {
        $this->beConstructedWith($userRepository);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(HomepageController::class);
    }

    function it_returns_a_successful_response_with_a_greeting(
        Request $request
    ) {
        $request->has('username')->willReturn(false);

        $response = $this->indexAction($request);

        $response->shouldBeAnInstanceOf(Response::class);
        $response->getContent()->shouldBeEqualTo('Hello there!');
        $response->getStatusCode()->shouldBeEqualTo(200);
    }

    function it_greets_user_if_username_is_provided_as_parameter(
        Request $request,
        UserRepositoryInterface $userRepository,
        UserInterface $user
    ) {
        $request->has('username')->willReturn(true);
        $request->get('username')->willReturn('pfazzi');

        $userRepository->findOneByUsername('pfazzi')->willReturn($user);

        $user->getName()->willReturn('Patrick');

        $response = $this->indexAction($request);

        $response->shouldBeAnInstanceOf(Response::class);
        $response->getContent()->shouldBeEqualTo('Hello Patrick!');
        $response->getStatusCode()->shouldBeEqualTo(200);
    }
}
