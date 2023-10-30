<?php

namespace App\Repository;

use App\Entity\User;

class DoctrineUserRepository extends DoctrineBaseRepository 
{
    protected static function entityClass(): string
    {
        return User::class;
    }

    public function findOneById(string $id): ?User
    {
        return $this->objectRepository->find($id);
    }

    public function save(User $user): void
    {
        $this->saveEntity($user);
    }

    public function remove(User $user): void
    {
        $this->removeEntity($user);
    }
}
