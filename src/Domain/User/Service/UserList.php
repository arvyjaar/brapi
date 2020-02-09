<?php

namespace App\Domain\User\Service;

use App\Interfaces\ServiceInterface;
use App\Domain\User\Repository\UserRepository;
use Illuminate\Support\Collection;

/**
 * Service.
 */
final class UserList implements ServiceInterface
{
    /**
     * @var UserRepository
     */
    private $repository;

    /**
     * Constructor.
     *
     * @param UserRepository $repository The repository
     */
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * List all users.
     *
     * @param array $params The parameters
     *
     * @return array The result
     */
    public function listAllUsers(): Collection
    {
        return $this->repository->index();
    }
}
