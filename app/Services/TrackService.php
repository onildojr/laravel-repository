<?php

namespace App\Services;

use App\Services\BaseService;
use App\Services\Interfaces\ITrackService;
use App\Repositories\Interfaces\ITrackRepository;
use App\Models\Track;

class TrackService extends BaseService implements ITrackService
{
    protected $_trackRepository;

    public function __construct(Track $model, ITrackRepository $trackRepository)
    {
        $this->_trackRepository = $trackRepository;

        parent::__construct($model, $trackRepository);
    }
}
