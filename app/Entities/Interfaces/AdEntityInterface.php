<?php

namespace App\Entities\Interfaces;

/**
 *
 */
interface AdEntityInterface
{
    /**
     * @return int|null
     */
    public function getId();

    /**
     * @return string|null
     */
    public function getTitle();

    /**
     * @return string|null
     */
    public function getDescription();

    /**
     * @return int|null
     */
    public function getUserId();

    /**
     * @return string|null timestamp
     */
    public function getCreatedAt();

    /**
     * @return string|null timestamp
     */
    public function getUpdatedAt();

    /**
     * @param string $val
     */
    public function setTitle($val);

    /**
     * @param string $val
     */
    public function setDescription($val);

    /**
     * @param int $val
     */
    public function setUserId($val);
}
