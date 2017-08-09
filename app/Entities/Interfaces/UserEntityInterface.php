<?php

namespace App\Entities\Interfaces;

/**
 *
 */
interface UserEntityInterface
{
    /**
     * @return int|null
     */
    public function getId();

    /**
     * @return string|null
     */
    public function getUsername();

    /**
     * @param string $name
     */
    public function setUsername($name);

    /**
     * @param string $password
     */
    public function setPassword($password);
}
