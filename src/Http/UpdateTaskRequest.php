<?php

declare(strict_types=1);

namespace App\Http;

final readonly class UpdateTaskRequest
{
    public function __construct(
        public ?string $title,
        public ?string $description,
        public ?string $status,
    ) {}
}
