<?php

declare(strict_types=1);

namespace App\Doctrine\EventSubscriber;

use Doctrine\Common\EventSubscriber;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Doctrine\ORM\Events;
use Psr\Log\LoggerInterface;
use App\Entity\User;

class UserEventSubscriber implements EventSubscriber
{
    public function __construct(private LoggerInterface $logger)
    {
    }

    public function getSubscribedEvents()
    {
        return [
            Events::preUpdate
        ];
    }

    public function preUpdate(LifecycleEventArgs $args) : void
    {
        $entity = $args->getObject();

        if ($entity instanceof User) {
            $this->logger->info(\sprintf('User has been updated. New name: %s', $entity->getName()));
        }
    }
}
