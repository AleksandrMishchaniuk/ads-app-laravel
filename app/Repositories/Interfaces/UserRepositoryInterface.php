<?php

namespace App\Repositories\Interfaces;

use App\Entities\Interfaces\UserEntityInterface;

/**
 *
 */
interface UserRepositoryInterface
{
    /**
     * @param string $username
     *
     * @return UserEntityInterface|null
     */
    public function getByUsername($username);

    /**
     * @param array $ids
     *
     * @return UserEntityInterface[]
     */
    public function getByIds($ids);

    /**
     * @param UserEntityInterface $user
     *
     * @return bool
     */
    public function save(UserEntityInterface $user);
}
