<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Psr\Log\LoggerInterface;

class HealthCheckController
{
    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    #[Route('/health-check', name: 'health_check', methods: ['GET'])]
    public function __invoke(): Response
    {
        $this->logger->error('This is the HealthCheckController error');
        return new JsonResponse(['status' => 'OK']);
    }
}
