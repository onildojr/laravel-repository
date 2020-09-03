<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Artist
 * 
 * @property int $id
 * @property string $name
 * 
 * @property Collection|Album[] $albums
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class Artist extends Model
{
	protected $table = 'artists';
	public $timestamps = false;

	protected $fillable = [
		'name'
	];

	public function albums()
	{
		return $this->hasMany(Album::class);
	}

	public function users()
	{
		return $this->belongsToMany(User::class, 'users_favorites_artists')
					->withPivot('id');
	}
}
