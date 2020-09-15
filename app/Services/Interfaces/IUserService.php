<?php

namespace App\Services\Interfaces;

use App\Models\User;

interface IUserService extends IBaseService
{
    public function findByUserName(string $username): ?User;
}
