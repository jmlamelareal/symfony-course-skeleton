<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\User;
use App\Repository\DoctrineUserRepository;
use App\Repository\RedisUserRepository;

class UpdateUserService
{
    public function __construct(private DoctrineUserRepository $doctrineUserRepository, private RedisUserRepository $redisUserRepository)
    {
    }

    public function __invoke(string $id, string $name) : User
    {
        if(!$user = $this->doctrineUserRepository->findOneById($id)) {
            throw new \Exception('User not found');
        }

        $user->setName($name);
        $this->doctrineUserRepository->save($user);
        $this->redisUserRepository->save($user);

        return $user;
    }
}
