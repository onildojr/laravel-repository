<?php

namespace App\Http\Middleware\Validators;

use App\Helpers\Response;
use App\Http\Validators\Interfaces\IAlbumValidator;
use App\Http\Validators\Interfaces\ITrackValidator;
use Closure;

class ValidateAlbum
{
    private $_albumValidator;
    private $_trackValidator;

    public function __construct(
        IAlbumValidator $albumValidator,
        ITrackValidator $trackValidator
    ) {
        $this->_albumValidator = $albumValidator;
        $this->_trackValidator = $trackValidator;
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
        $errors = $this->_albumValidator->isValid($data);
        if ($errors) {
            return Response::badRequest($errors);
        }

        if ($request->has('tracks')) {
            foreach ($request->tracks as $track) {
                $errors = $this->_trackValidator->isValid($track);
                if ($errors) {
                    return Response::badRequest($errors);
                }
            }
        }

        return $next($request);
    }
}
