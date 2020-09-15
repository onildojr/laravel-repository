<?php

namespace App\Http\Controllers;

use App\Helpers\Response;
use App\Services\Interfaces\IUserService;
use App\Http\Validators\Interfaces\IUserValidator;
use Exception;
use Illuminate\Http\Request;

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
        try {
            $users = $this->_userService->all();
            return Response::ok($users);
        } catch (Exception $e) {
            return Response::internalServerError();
        }
    }

    public function find(int $id)
    {
        try {
            $user = $this->_userService->find($id);
            return Response::ok($user);
        } catch (Exception $e) {
            return Response::internalServerError();
        }
    }

    public function create(Request $request)
    {
        try {
            $data = $request->all();
            $errors = $this->_userValidator->isValid($data);
            if ($errors) {
                return Response::badRequest($errors);
            }

            $user = $this->_userService->create($data);
            return Response::created($user);
        } catch (Exception $e) {
            return Response::internalServerError();
        }
    }

    public function update(Request $request, int $id)
    {
        try {
            $data = $request->all();
            $errors = $this->_userValidator->isValid($data);
            if ($errors) {
                return Response::badRequest($errors);
            }

            $user = $this->_userService->update($id, $data);
            return Response::ok($user);
        } catch (Exception $e) {
            return Response::internalServerError();
        }
    }

    public function delete(int $id)
    {
        try {
            $user = $this->_userService->delete($id);
            return Response::ok($user);
        } catch (Exception $e) {
            return Response::internalServerError();
        }
    }
}
