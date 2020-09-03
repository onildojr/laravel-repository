<?php

namespace App\Repositories\Interfaces;

use App\Models\User;
use Illuminate\Support\Collection;

interface IUserRepository
{
   public function findByUserName(string $username) : ?User;
}
