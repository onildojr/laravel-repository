<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Services\Interfaces\IUserService;
use App\Http\Validators\Interfaces\IUserValidator;
use App\Http\Validators\UserValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controller as BaseController;

class UsersController extends Controller
{
    private $_userService;
    private $_userValidator;

    public function __construct(
        IUserService $userService,
        IUserValidator $userValidator
    ) {
        $this->_userService = $userService;
        $this->_userValidator = $userValidator;
    }

    public function all()
    {
        $users = $this->_userService->all();

        return Ok($users);
    }

    public function find(int $id)
    {
        $users = $this->_userService->find($id);

        return Ok($users);
    }

    public function create(Request $request)
    {
        $data = $request->all();
        $errors = $this->_userValidator->isValid($data);
        if ($errors) {
            return BadRequest($errors);
        }

        $user = $this->_userService->create($data);

        return Created($user);
    }
}
