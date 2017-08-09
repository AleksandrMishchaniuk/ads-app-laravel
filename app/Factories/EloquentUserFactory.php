<?php

namespace App\Factories;

use App\Factories\Interfaces\UserFactoryInterface;
use App\Models\User;

/**
 *
 */
class EloquentUserFactory implements UserFactoryInterface
{
    /**
     * {@inheritDoc}
     */
    public function create($data)
    {
        $user = new User;

        if (isset($data['username'])) {
            $user->setUsername($data['username']);
        }

        if (isset($data['password'])) {
            $user->setPassword(bcrypt($data['password']));
        }

        return $user;
    }
}
