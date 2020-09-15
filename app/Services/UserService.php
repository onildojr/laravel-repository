<?php

namespace App\Services;

use App\Services\BaseService;
use App\Services\Interfaces\IUserService;
use App\Repositories\Interfaces\IUserRepository;
use App\Models\User;

class UserService extends BaseService implements IUserService
{
    protected $_userRepository;

    public function __construct(User $model, IUserRepository $userRepository)
    {
        $this->_userRepository = $userRepository;

        parent::__construct($model, $userRepository);
    }

    public function findByUserName(string $username): ?User
    {
        return $this->_userRepository->findByUserName($username);
    }
}
