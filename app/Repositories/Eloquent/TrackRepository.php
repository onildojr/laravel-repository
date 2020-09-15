<?php

namespace App\Repositories\Eloquent;

use App\Models\Track;
use App\Repositories\Interfaces\ITrackRepository;
use Illuminate\Database\Eloquent\Collection;

class TrackRepository extends BaseRepository implements ITrackRepository
{
    /**
     * TrackRepository constructor.
     * @param Track $model
     */
    public function __construct(Track $model)
    {
        parent::__construct($model);
    }

    /**
     * Busca os Tracks por AlbumId.
     * @param int $id
     *
     * @return Collection
     */
    public function getByAlbumId(int $id): ?Collection
    {
        return $this->_model->where('album_id', '=', $id)->get();
    }
}
