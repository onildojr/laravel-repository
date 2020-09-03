<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UsersFavoritesTrack
 * 
 * @property int $id
 * @property int $user_id
 * @property int $track_id
 * 
 * @property Track $track
 * @property User $user
 *
 * @package App\Models
 */
class UsersFavoritesTrack extends Model
{
	protected $table = 'users_favorites_tracks';
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'track_id' => 'int'
	];

	protected $fillable = [
		'user_id',
		'track_id'
	];

	public function track()
	{
		return $this->belongsTo(Track::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
