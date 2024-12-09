<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Task;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\LockMode;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Task>
 *
 * @method Task|null find(mixed $id, LockMode|int|null $lockMode = null, int|null $lockVersion = null)
 * @method Task|null findOneBy(array $criteria, ?array $orderBy = null)
 * @method Task[] findAll()
 * @method Task[] findBy(array $criteria, ?array $orderBy = null, ?int $limit = null, ?int $offset = null)
 */
class TaskRepository extends ServiceEntityRepository
{

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Task::class);
    }
}
