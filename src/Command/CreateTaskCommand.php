<?php

declare(strict_types=1);

namespace App\Command;

class CreateTaskCommand
{
    public function __construct(
        public string $id,
        public string $title,
        public string $description
    ) {}
}
