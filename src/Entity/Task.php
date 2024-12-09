<?php

declare(strict_types=1);

namespace App\Entity;

use App\Enum\TaskStatus;
use App\Repository\TaskRepository;
use DateTimeImmutable;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Id;
use Symfony\Bridge\Doctrine\Types\UuidType;
use Symfony\Component\Serializer\Attribute\Groups;
use Symfony\Component\Uid\Uuid;

#[Entity(repositoryClass: TaskRepository::class)]
class Task
{
    #[Id]
    #[Column(type: UuidType::NAME, unique: true)]
    #[Groups(['task_read'])]
    private Uuid $id;
    #[Column(length: 255)]
    #[Groups(['task_read'])]
    private string $title;

    #[Column(type: Types::TEXT)]
    #[Groups(['task_read'])]
    private string $description;

    #[Column(length: 100)]
    #[Groups(['task_read'])]
    private TaskStatus $status;

    #[Column(type: Types::DATE_IMMUTABLE)]
    private DateTimeImmutable $createdAt;

    #[Column(type: Types::DATE_IMMUTABLE, nullable: true)]
    private ?DateTimeImmutable $updatedAt = null;

    public function getId(): Uuid
    {
        return $this->id;
    }

    public function setId(Uuid $id): void
    {
        $this->id = $id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getStatus(): TaskStatus
    {
        return $this->status;
    }

    public function setStatus(TaskStatus $status): void
    {
        $this->status = $status;
    }

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTimeImmutable $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getUpdatedAt(): ?DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?DateTimeImmutable $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }
}
