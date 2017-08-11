<?php

namespace App\Repositories;

use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Entities\Interfaces\UserEntityInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

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
    public function getByIds($ids)
    {
        $result = $this->model->whereIn(User::ATTR_ID, $ids)->get();
        return $this->toArray($result);
    }

    /**
     * {@inheritDoc}
     */
    public function save(UserEntityInterface $user)
    {
        return $user->save();
    }

    /**
     * @param Collection $collection
     *
     * @return UserEntityInterface[]
     */
    protected function toArray(Collection $collection)
    {
        $res = [];
        foreach ($collection as $item) {
            $res[] = $item;
        }
        return $res;
    }
}
