<?php

namespace App\Repositories\Eloquent;

use App\Models\Artist;
use App\Repositories\Interfaces\IArtistRepository;

class ArtistRepository extends BaseRepository implements IArtistRepository
{
    /**
     * ArtistRepository constructor.
     * @param Artist $model
     */
    public function __construct(Artist $model)
    {
        parent::__construct($model);
    }
}
