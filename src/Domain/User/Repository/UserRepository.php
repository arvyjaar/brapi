<?php

namespace App\Domain\User\Repository;

use App\Interfaces\RepositoryInterface;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Support\Collection;

/**
 * Repository.
 */
class UserRepository implements RepositoryInterface
{
    /**
     * @var Capsule
     */
    private $capsule;

    /**
     * Constructor.
     *
     * @param Capsule $capsule Eloquent from Laravel
     */
    public function __construct(Capsule $capsule)
    {
        $this->capsule = $capsule;
    }

    /**
     * Load all entries.
     *
     * @return object The table data
     */
    public function index(): Collection
    {

        return $this->capsule->table('users')->select('username', 'email', 'role')->get();
    }
}
