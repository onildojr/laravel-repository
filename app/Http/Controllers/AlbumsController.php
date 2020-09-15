<?php

namespace App\Http\Controllers;

use App\Helpers\Response;
use App\Services\Interfaces\IAlbumService;
use App\Http\Validators\Interfaces\IAlbumValidator;
use App\Http\Validators\Interfaces\ITrackValidator;
use Exception;
use Illuminate\Http\Request;

class AlbumsController extends Controller
{
    private $_albumService;
    private $_albumValidator;
    private $_trackValidator;

    public function __construct(
        IAlbumService $albumService,
        IAlbumValidator $albumValidator,
        ITrackValidator $trackValidator
    ) {
        $this->_albumService = $albumService;
        $this->_albumValidator = $albumValidator;
        $this->_trackValidator = $trackValidator;
    }

    public function all()
    {
        try {
            $albums = $this->_albumService->all();
            return Response::ok($albums);
        } catch (Exception $e) {
            return Response::internalServerError();
        }
    }

    public function find(int $id)
    {
        try {
            $album = $this->_albumService->find($id);
            return Response::ok($album);
        } catch (Exception $e) {
            return Response::internalServerError();
        }
    }

    public function create(Request $request)
    {
        try {
            $data = $request->all();
            $errors = $this->_albumValidator->isValid($data);
            if ($errors) {
                return Response::badRequest($errors);
            }

            if ($request->has('tracks')) {
                foreach ($request->tracks as $track) {
                    $errors = $this->_trackValidator->isValid($data);
                    if ($errors) {
                        return Response::badRequest($errors);
                    }
                }
            }

            $album = $this->_albumService->create($data);
            return Response::created($album);
        } catch (Exception $e) {
            dd($e->getMessage() . "  " . $e->getLine() . "  " . $e->getFile());
            return Response::internalServerError();
        }
    }

    public function update(Request $request, int $id)
    {
        try {
            $data = $request->all();
            $errors = $this->_albumValidator->isValid($data);
            if ($errors) {
                return Response::badRequest($errors);
            }

            $album = $this->_albumService->update($id, $data);
            return Response::ok($album);
        } catch (Exception $e) {
            return Response::internalServerError();
        }
    }

    public function delete(int $id)
    {
        try {
            $album = $this->_albumService->delete($id);
            return Response::ok($album);
        } catch (Exception $e) {
            return Response::internalServerError();
        }
    }
}
