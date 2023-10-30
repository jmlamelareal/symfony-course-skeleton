<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\User;
use App\Repository\DoctrineUserRepository;

class UpdateUserService
{
    public function __construct(private DoctrineUserRepository $userRepository)
    {
        // ...
    }

    public function __invoke(string $id, string $name) : User
    {
        if(!$user = $this->userRepository->findOneById($id)) {
            throw new \Exception('User not found');
        }

        $user->setName($name);
        $this->userRepository->save($user);

        return $user;
    }
}
