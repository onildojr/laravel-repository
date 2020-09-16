<?php

namespace App\Http\Middleware\Validators;

use App\Helpers\Response;
use App\Http\Validators\Interfaces\IArtistValidator;
use Closure;

class ValidateArtist
{
    private $_artistValidator;

    public function __construct(
        IArtistValidator $artistValidator
    ) {
        $this->_artistValidator = $artistValidator;
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

        $errors = $this->_artistValidator->isValid($data);
        if ($errors) {
            return Response::badRequest($errors);
        }

        return $next($request);
    }
}
