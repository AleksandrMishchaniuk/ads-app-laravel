<?php

namespace App\Repositories;

use App\Repositories\Interfaces\AdRepositoryInterface;
use App\Entities\Interfaces\AdEntityInterface;
use App\Models\Ad;
use Illuminate\Database\Eloquent\Collection;

/**
 *
 */
class EloquentAdRepository implements AdRepositoryInterface
{
    /**
     * @var Ad
     */
    protected $model;

    /**
     * @param Ad $user
     */
    function __construct(Ad $model)
    {
        $this->model = $model;
    }

    /**
     * {@inheritDoc}
     */
    public function getAll()
    {
        return $this->toArray($this->model->all()->orderBy(Ad::ATTR_ID, 'desc'));
    }

    /**
     * {@inheritDoc}
     */
    public function getPage($count, $page = 1)
    {
        if ($page < 1) {
            $page = 1;
        }
        $offset = ($page - 1) * $count;
        $result = $this->model  ->offset($offset)->limit($count)
                                ->orderBy(Ad::ATTR_ID, 'desc')->get();
        return $this->toArray($result);
    }

    /**
     * {@inheritDoc}
     */
    public function getById($id)
    {
        return $this->model->where(Ad::ATTR_ID, $id)->first();
    }

    /**
     * {@inheritDoc}
     */
    public function getByUserId($id)
    {
        return $this->model->where(Ad::ATTR_USER_ID, $id)->first();
    }

    /**
     * {@inheritDoc}
     */
    public function getCount()
    {
        return $this->model->count();
    }

    /**
     * {@inheritDoc}
     */
    public function save(AdEntityInterface $user)
    {
        return $user->save();
    }

    /**
     * {@inheritDoc}
     */
    public function destroyById($id)
    {
        return $this->model->destroy($id);
    }

    /**
     * @param Collection $collection
     *
     * @return AdEntityInterface[]
     */
    protected function toArray(Collection $collection)
    {
        $res = [];
        foreach ($collection as $item) {
            $res[] = $item;
        }
        return $res;
    }
}
