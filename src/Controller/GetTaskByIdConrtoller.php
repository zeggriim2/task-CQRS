<?php

declare(strict_types=1);

namespace App\Controller;

use App\Handler\GetTaskByIdHandler;
use App\Query\GetTaskByIdQuery;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/tasks/{taskId}', name: 'get_task', methods: Request::METHOD_GET, format: 'json')]
final readonly class GetTaskByIdConrtoller
{

    public function __construct(private GetTaskByIdHandler $handler) {}

    public function __invoke(string $taskId): JsonResponse
    {
        try {
            $task = $this->handler->handle(new GetTaskByIdQuery($taskId));
        } catch (\Exception $exception) {
            return new JsonResponse(null, Response::HTTP_NOT_FOUND);
        }

        return new JsonResponse(
            [
                'id' => $task->getId(),
                'title' => $task->getTitle(),
                'description' => $task->getDescription(),
                'status' => $task->getStatus(),
            ],
            Response::HTTP_OK);
    }
}
