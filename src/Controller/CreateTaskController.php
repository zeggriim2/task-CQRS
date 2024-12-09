<?php

declare(strict_types=1);

namespace App\Controller;

use App\Command\CreateTaskCommand;
use App\Handler\CreateTaskHandler;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/tasks', name: 'create_tasks', methods: [Request::METHOD_POST])]
final readonly class CreateTaskController
{
    public function __construct(
        private CreateTaskHandler $createTaskHandler,
    ) {}

    public function __invoke(#[MapRequestPayload] CreateTaskCommand $command): Response
    {
        $this->createTaskHandler->handle($command);

        return new Response(status: Response::HTTP_CREATED);
    }
}
