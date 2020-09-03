<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Album
 * 
 * @property int $id
 * @property string $name
 * @property Carbon $release_year
 * @property int $artist_id
 * 
 * @property Artist $artist
 * @property Collection|Track[] $tracks
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class Album extends Model
{
	protected $table = 'albums';
	public $timestamps = false;

	protected $casts = [
		'artist_id' => 'int'
	];

	protected $dates = [
		'release_year'
	];

	protected $fillable = [
		'name',
		'release_year',
		'artist_id'
	];

	public function artist()
	{
		return $this->belongsTo(Artist::class);
	}

	public function tracks()
	{
		return $this->hasMany(Track::class);
	}

	public function users()
	{
		return $this->belongsToMany(User::class, 'users_favorites_albums')
					->withPivot('id');
	}
}
