<?php

namespace App\Repositories\Interfaces;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
* Interface EloquentRepository
* @package App\Repositories
*/
interface IEloquentRepository
{
   /**
    * @param array $attributes
    * @return Model
    */
   public function create(array $attributes) : Model;

   /**
    * @param int $id
    * @return Model
    */
   public function find(int $id) : ?Model;

   /**
    * @return Collection
    */
    public function all() : Collection;

   /**
    * @param int $id
    * @return Model
    */
    public function update(int $id, array $attributes) : Model;

   /**
    * @param int $id
    * @return Model
    */
    public function delete(int $id) : Model;
}