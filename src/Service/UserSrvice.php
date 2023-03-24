<?php

declare(strict_types=1);

namespace App\Service;

use App\Repository\UserRepository;
use App\Utils\Maybe;

class UserSrvice
{

    public function __construct(private readonly UserRepository $userRepository)
    {
    }

    public function getUserByEmail(string $email): Maybe
    {
        return Maybe::just($this->userRepository->getUserByEmail($email));
    }
}
