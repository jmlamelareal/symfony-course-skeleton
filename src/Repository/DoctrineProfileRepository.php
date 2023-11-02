<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Profile;

class DoctrineProfileRepository extends DoctrineBaseRepository 
{
    protected static function entityClass(): string
    {
        return Profile::class;
    }

    public function findOneById(string $id): ?Profile
    {
        return $this->objectRepository->find($id);
    }

    public function save(Profile $profile): void
    {
        $this->saveEntity($profile);
    }

    public function remove(Profile $profile): void
    {
        $this->removeEntity($profile);
    }
}
