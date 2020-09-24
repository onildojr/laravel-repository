<?php

namespace App\Http\Controllers;

use App\Helpers\Response;
use App\Http\Requests\ArtistRquest;
use App\Repositories\Eloquent\ArtistRepository;
use App\Services\Interfaces\IArtistService;
use Exception;
use Illuminate\Http\Request;

class ArtistsController extends Controller
{
    private $_artistService;

    public function __construct(
        IArtistService $artistService
    ) {
        $this->_artistService = $artistService;
    }

    public function all()
    {
        try {
            $artists = $this->_artistService->all();
            return Response::ok($artists);
        } catch (Exception $e) {
            return Response::internalServerError();
        }
    }

    public function find(int $id)
    {
        try {
            $artist = $this->_artistService->find($id);
            return Response::ok($artist);
        } catch (Exception $e) {
            return Response::internalServerError();
        }
    }

    public function create(ArtistRquest $request)
    {
        try {
            $artist = $this->_artistService->create($request->all());
            return Response::created($artist);
        } catch (Exception $e) {
            return Response::internalServerError();
        }
    }

    public function update(Request $request, int $id)
    {
        try {
            $artist = $this->_artistService->update($id, $request->all());
            return Response::ok($artist);
        } catch (Exception $e) {
            return Response::internalServerError();
        }
    }

    public function delete(int $id)
    {
        try {
            $artist = $this->_artistService->delete($id);
            return Response::ok($artist);
        } catch (Exception $e) {
            return Response::internalServerError();
        }
    }
}
