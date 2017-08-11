<?php

namespace App\Repositories\Interfaces;

use App\Entities\Interfaces\AdEntityInterface;

/**
 *
 */
interface AdRepositoryInterface
{
    /**
     * @return AdEntityInterface[]
     */
    public function getAll();

    /**
     * @param int $count
     * @param int $page
     *
     * @return AdEntityInterface[]
     */
    public function getPage($count, $page = 1);

    /**
     * @param int $id
     *
     * @return AdEntityInterface|null
     */
    public function getById($id);

    /**
     * @param int $id
     *
     * @return AdEntityInterface[]|null
     */
    public function getByUserId($id);

    /**
     * @return int
     */
    public function getCount();

    /**
     * @param AdEntityInterface $user
     *
     * @return bool
     */
    public function save(AdEntityInterface $user);
}
