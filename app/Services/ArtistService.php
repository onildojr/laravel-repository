<?php

namespace App\Services;

use App\Services\BaseService;
use App\Services\Interfaces\IArtistService;
use App\Repositories\Interfaces\IArtistRepository;
use App\Models\Artist;

class ArtistService extends BaseService implements IArtistService
{
    protected $_artistRepository;

    public function __construct(Artist $model, IArtistRepository $artistRepository)
    {
        $this->_artistRepository = $artistRepository;

        parent::__construct($model, $artistRepository);
    }
}
