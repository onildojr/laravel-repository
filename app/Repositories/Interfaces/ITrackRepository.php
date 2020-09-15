<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface ITrackRepository
{
    public function getByAlbumId(int $id): ?Collection;
}
