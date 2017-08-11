<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Entities\Interfaces\UserEntityInterface;

class User extends Authenticatable implements UserEntityInterface
{
    const ATTR_ID = 'id';
    const ATTR_USERNAME = 'username';
    const ATTR_PASSWORD = 'password';
    const ATTR_REMEMBER_TOKEN = 'remember_token';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        self::ATTR_PASSWORD, self::ATTR_REMEMBER_TOKEN
    ];

    /**
     * {@inheritDoc}
     */
    public function getId()
    {
        return $this->{self::ATTR_ID};
    }

    /**
     * {@inheritDoc}
     */
    public function getUsername()
    {
        return $this->{self::ATTR_USERNAME};
    }

    /**
     * {@inheritDoc}
     */
    public function setUsername($name)
    {
        $this->{self::ATTR_USERNAME} = $name;
    }

    /**
     * {@inheritDoc}
     */
    public function setPassword($password)
    {
        $this->{self::ATTR_PASSWORD} = $password;
    }
}
