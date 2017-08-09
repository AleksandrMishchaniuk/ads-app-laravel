<?php

namespace App\Repositories;

use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Entities\Interfaces\UserEntityInterface;
use App\Models\User;

/**
 *
 */
class EloquentUserRepository implements UserRepositoryInterface
{
    /**
     * @var User
     */
    protected $model;

    /**
     * @param User $user
     */
    function __construct(User $user)
    {
        $this->model = $user;
    }

    /**
     * {@inheritDoc}
     */
    public function getByUsername($username)
    {
        return $this->model->where(User::ATTR_USERNAME, $username)->first();
    }

    /**
     * {@inheritDoc}
     */
    public function save(UserEntityInterface $user)
    {
        return $user->save();
    }
}
