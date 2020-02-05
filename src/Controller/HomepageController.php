<?php

namespace Controller;

use Http\Request;
use Http\Response;
use Repository\UserRepositoryInterface;

class HomepageController
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function indexAction(Request $request): Response
    {
        $name = 'there';

        if ($request->has('username')) {
            $user = $this->userRepository->findOneByUsername(
                $request->get('username')
            );

            $name = $user->getName();
        }

        return Response::create(sprintf('Hello %s!', $name), 200);
    }
}
