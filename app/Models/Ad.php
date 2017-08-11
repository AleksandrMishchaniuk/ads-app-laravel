<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Entities\Interfaces\AdEntityInterface;

class Ad extends Model implements AdEntityInterface
{
    const ATTR_ID = 'id';
    const ATTR_TITLE = 'title';
    const ATTR_DESCRIPTION = 'description';
    const ATTR_USER_ID = 'user_id';
    const ATTR_CREATED_AT = 'created_at';
    const ATTR_UPDATED_AT = 'updated_at';

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
    public function getTitle()
    {
        return $this->{self::ATTR_TITLE};
    }

    /**
     * {@inheritDoc}
     */
    public function getDescription()
    {
        return $this->{self::ATTR_DESCRIPTION};
    }

    /**
     * {@inheritDoc}
     */
    public function getUserId()
    {
        return $this->{self::ATTR_USER_ID};
    }

    /**
     * {@inheritDoc}
     */
    public function getCreatedAt()
    {
        return $this->{self::ATTR_CREATED_AT};
    }

    /**
     * {@inheritDoc}
     */
    public function getUpdatedAt()
    {
        return $this->{self::ATTR_UPDATED_AT};
    }

    /**
     * {@inheritDoc}
     */
    public function setTitle($val)
    {
        $this->{self::ATTR_TITLE} = $val;
    }

    /**
     * {@inheritDoc}
     */
    public function setDescription($val)
    {
        $this->{self::ATTR_DESCRIPTION} = $val;
    }

    /**
     * {@inheritDoc}
     */
    public function setUserId($val)
    {
        $this->{self::ATTR_USER_ID} = $val;
    }
}
