<?php

namespace App\Factories\Interfaces;

use App\Entities\Interfaces\AdEntityInterface;

/**
 *
 */
interface AdFactoryInterface
{
    /**
     * @param array $data
     *
     * @return AdEntityInterface
     */
    public function create($data);
}
