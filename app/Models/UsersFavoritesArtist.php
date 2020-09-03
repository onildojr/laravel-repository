<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UsersFavoritesArtist
 * 
 * @property int $id
 * @property int $user_id
 * @property int $artist_id
 * 
 * @property Artist $artist
 * @property User $user
 *
 * @package App\Models
 */
class UsersFavoritesArtist extends Model
{
	protected $table = 'users_favorites_artists';
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'artist_id' => 'int'
	];

	protected $fillable = [
		'user_id',
		'artist_id'
	];

	public function artist()
	{
		return $this->belongsTo(Artist::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
