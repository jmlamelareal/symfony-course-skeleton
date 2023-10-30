<?php

declare(strict_types=1);

namespace App\Controller;
use App\Service\UpdateUserService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class UpdateUserAction
{
    public function __construct(private UpdateUserService $updateUserService)
    {
        // ...
    }

    public function __invoke(Request $request, $id) : JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $user = $this->updateUserService->__invoke(
            $id,
            $data['name']
        );

        return new JsonResponse(
            [
                'user' => [
                    'id' => $user->getId(),
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'created_on' => $user->getCreatedOn()->format(\DateTime::RFC3339),
                ],
            ],
            JsonResponse::HTTP_OK
        );
        
    }
}
