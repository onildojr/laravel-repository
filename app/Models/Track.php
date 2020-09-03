<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Track
 * 
 * @property int $id
 * @property string $name
 * @property int $duration
 * @property int $album_id
 * @property int $order
 * 
 * @property Album $album
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class Track extends Model
{
	protected $table = 'tracks';
	public $timestamps = false;

	protected $casts = [
		'duration' => 'int',
		'album_id' => 'int',
		'order' => 'int'
	];

	protected $fillable = [
		'name',
		'duration',
		'album_id',
		'order'
	];

	public function album()
	{
		return $this->belongsTo(Album::class);
	}

	public function users()
	{
		return $this->belongsToMany(User::class, 'users_favorites_tracks')
					->withPivot('id');
	}
}
