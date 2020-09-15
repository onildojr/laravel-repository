<?php

namespace App\Services;

use App\Services\BaseService;
use App\Services\Interfaces\IAlbumService;
use App\Repositories\Interfaces\IAlbumRepository;
use App\Models\Album;

class AlbumService extends BaseService implements IAlbumService
{
    protected $_albumRepository;

    public function __construct(Album $model, IAlbumRepository $albumRepository)
    {
        $this->_albumRepository = $albumRepository;

        parent::__construct($model, $albumRepository);
    }
}
