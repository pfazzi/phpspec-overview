<?php

namespace Repository;

use Entity\UserInterface;

interface UserRepositoryInterface
{
    public function findOneByUsername(string $username): UserInterface;
}
