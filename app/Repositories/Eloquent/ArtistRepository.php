<?php

namespace App\Repositories\Eloquent;

use App\Models\Artist;
use App\Repositories\Interfaces\IArtistRepository;
use Illuminate\Support\Collection;

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

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->_model
            ->with('albums', 'albums.tracks')
            ->get();
    }
}
