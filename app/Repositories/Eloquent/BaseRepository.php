<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Interfaces\IEloquentRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class BaseRepository implements IEloquentRepository
{
    /**
     * @var Model
     */
    protected $_model;

    /**
     * BaseRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->_model = $model;
    }

    /**
     * @param array $attributes
     *
     * @return Model
     */
    public function create(array $attributes): Model
    {
        $model = $this->_model->create($attributes);
        $model->refresh();

        return $model;
    }

    /**
     * @param $id
     * @return Model
     */
    public function find($id): ?Model
    {
        return $this->_model->find($id);
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->_model->all();
    }

    /**
     * @param int $id
     * @return Model
     */
    public function update(int $id, array $attributes): Model
    {
        $item = $this->_model->find($id);
        $item->fill($attributes);
        $item->save();
        return $item;
    }

    /**
     * @param int $id
     * @return Model
     */
    public function delete(int $id): Model
    {
        $item = $this->_model->find($id);
        $item->delete();
        return $item;
    }
}
