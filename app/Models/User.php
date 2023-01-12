<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class User extends Authenticatable implements JWTSubject
{
	use HasFactory;
	use Notifiable;


	protected $table = 'users';
	protected $guarded = false;


	// Rest omitted for brevity

	/**
	 * Get the identifier that will be stored in the subject claim of the JWT.
	 *
	 * @return mixed
	 */
	public function getJWTIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Return a key value array, containing any custom claims to be added to the JWT.
	 *
	 * @return array
	 */
	public function getJWTCustomClaims()
	{
		return [];
	}

	public function LikedPosts()
	{
		return $this->belongsToMany(Post::class, 'likes', 'user_id', 'post_id');
	}

	public function comments()
	{
		return $this->hasMany(Comment::class, 'user_id', 'id');
	}
}
