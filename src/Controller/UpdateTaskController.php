<?php

declare(strict_types=1);

namespace App\Controller;

use App\Command\UpdateTaskCommand;
use App\Handler\UpdateTaskHandler;
use App\Http\UpdateTaskRequest;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Attribute\Route;

#[Route('//api/tasks/{id}', name: 'update_task', methods: [Request::METHOD_PUT], format: 'json')]
final readonly class UpdateTaskController
{
    public function __construct(private UpdateTaskHandler $handler) {}

    public function __invoke(string $id, #[MapRequestPayload] UpdateTaskRequest $request): Response
    {
        $this->handler->handle(
            new UpdateTaskCommand(
                $id,
                $request->title,
                $request->description,
                $request->status
            )
        );

        return new Response(status: Response::HTTP_OK);
    }
}
