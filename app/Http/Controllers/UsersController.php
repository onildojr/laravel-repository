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

    public function __construct(
        IUserService $userService
    ) {
        $this->_userService = $userService;
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
            $user = $this->_userService->create($request->all());
            return Response::created($user);
        } catch (Exception $e) {
            return Response::internalServerError();
        }
    }

    public function update(Request $request, int $id)
    {
        try {
            $user = $this->_userService->update($id, $request->all());
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
