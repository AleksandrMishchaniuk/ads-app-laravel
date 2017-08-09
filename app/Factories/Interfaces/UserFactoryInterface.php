<?php

namespace App\Factories\Interfaces;

use App\Entities\Interfaces\UserEntityInterface;

/**
 *
 */
interface UserFactoryInterface
{
    /**
     * @param array $data
     *
     * @return UserEntityInterface
     */
    public function create($data);
}
