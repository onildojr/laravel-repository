<?php

namespace App\Services\Interfaces;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

/**
* Interface BaseService
* @package App\Services
*/
interface IBaseService
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
