<?php

namespace App\Http\Middleware\Validators;

use App\Helpers\Response;
use App\Http\Validators\Interfaces\IUserValidator;
use Closure;

class ValidateUser
{
    private $_userValidator;

    public function __construct(
        IUserValidator $userValidator
    ) {
        $this->_userValidator = $userValidator;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $data = $request->all();

        $errors = $this->_userValidator->isValid($data);
        if ($errors) {
            return Response::badRequest($errors);
        }

        return $next($request);
    }
}
