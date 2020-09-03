<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * 
 * @property int $id
 * @property string $name
 * @property Carbon $birth
 * @property string $gender
 * @property string $username
 * @property string $password
 * 
 * @property Collection|Album[] $albums
 * @property Collection|Artist[] $artists
 * @property Collection|Track[] $tracks
 *
 * @package App\Models
 */
class User extends Model
{
	protected $table = 'users';
	public $timestamps = false;

	protected $dates = [
		'birth'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'name',
		'birth',
		'gender',
		'username',
		'password'
	];

	public function albums()
	{
		return $this->belongsToMany(Album::class, 'users_favorites_albums')
					->withPivot('id');
	}

	public function artists()
	{
		return $this->belongsToMany(Artist::class, 'users_favorites_artists')
					->withPivot('id');
	}

	public function tracks()
	{
		return $this->belongsToMany(Track::class, 'users_favorites_tracks')
					->withPivot('id');
	}
}
