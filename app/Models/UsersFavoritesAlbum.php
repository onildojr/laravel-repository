<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UsersFavoritesAlbum
 * 
 * @property int $id
 * @property int $user_id
 * @property int $album_id
 * 
 * @property Album $album
 * @property User $user
 *
 * @package App\Models
 */
class UsersFavoritesAlbum extends Model
{
	protected $table = 'users_favorites_albums';
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'album_id' => 'int'
	];

	protected $fillable = [
		'user_id',
		'album_id'
	];

	public function album()
	{
		return $this->belongsTo(Album::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
