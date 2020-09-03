<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use App\Services\Interfaces\IBaseService;
use Illuminate\Support\Collection;

class BaseService implements IBaseService
{
    protected $_model;
    protected $_repository;

    public function __construct(Model $model, $repository)
    {
        $this->_model = $model;
        $this->_repository = $repository;
    }

    public function create(array $attributes): Model
    {
        return $this->_repository->create($attributes);
    }

    public function find($id): ?Model
    {
        return $this->_repository->find($id);
    }

    public function all() : Collection
    {
        return $this->_repository->all();
    }

    public function update(int $id, array $attributes) : Model
    {
        return $this->_repository->update($id, $attributes);;
    }

    public function delete(int $id) : Model
    {
        return $this->_repository->delete($id);
    }
}
