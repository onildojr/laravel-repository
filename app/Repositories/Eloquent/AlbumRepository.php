<?php

namespace App\Repositories\Eloquent;

use App\Models\Album;
use App\Repositories\Interfaces\IAlbumRepository;
use Illuminate\Database\Eloquent\Model;

class AlbumRepository extends BaseRepository implements IAlbumRepository
{
    /**
     * AlbumRepository constructor.
     * @param Album $model
     */
    public function __construct(Album $model)
    {
        parent::__construct($model);
    }

    public function find($id): ?Model
    {
        return $this->_model
            ->with('tracks')
            ->find($id);
    }

    public function create(array $attributes): Model
    {
        $album = $this->_model->create($attributes);
        $album->refresh();

        if (isset($attributes['tracks']) && $attributes['tracks']) {
            foreach ($attributes['tracks'] as $track) {
                $album->tracks()->create($track);
            }
        }
        $album->refresh();
        $album = $this->find($album->id);

        return $album;
    }
}
