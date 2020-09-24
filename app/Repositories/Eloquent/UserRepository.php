<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Interfaces\IUserRepository;
use Illuminate\Support\Collection;

class UserRepository extends BaseRepository implements IUserRepository
{
    protected $_model;

    /**
     * UserRepository constructor.
     * @param User $model
     */
    public function __construct(User $model)
    {
        $this->_model = $model;
        parent::__construct($model);
    }

    /**
     * Busca um usuário por username.
     * @param string $username
     *
     * @return User
     */
    public function findByUserName(string $username): ?User
    {
        return $this->_model->where('username', '=', $username)->first();
    }
}
