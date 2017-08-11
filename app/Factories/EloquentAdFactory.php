<?php

namespace App\Factories;

use App\Factories\Interfaces\AdFactoryInterface;
use App\Models\Ad;

/**
 *
 */
class EloquentAdFactory implements AdFactoryInterface
{
    /**
     * {@inheritDoc}
     */
    public function create($data)
    {
        $entity = new Ad;

        if (isset($data['title'])) {
            $entity->setTitle($data['title']);
        }

        if (isset($data['description'])) {
            $entity->setDescription($data['description']);
        }

        if (isset($data['user_id'])) {
            $entity->setUserId($data['user_id']);
        }

        return $entity;
    }
}
