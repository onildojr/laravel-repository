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

    public function __construct(
        IAlbumService $albumService
    ) {
        $this->_albumService = $albumService;
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
            $album = $this->_albumService->create($request->all());
            return Response::created($album);
        } catch (Exception $e) {
            return Response::internalServerError();
        }
    }

    public function update(Request $request, int $id)
    {
        try {
            $album = $this->_albumService->update($id, $request->all());
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
