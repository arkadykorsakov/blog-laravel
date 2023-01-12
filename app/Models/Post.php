<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
	use HasFactory;

	protected $table = 'posts';
	protected $guarded = false;

	public function category()
	{
		return $this->belongsTo(Category::class, 'category_id', 'id');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'user_id', 'id');
	}

	public function comments()
	{
		return $this->hasMany(Comment::class,  'post_id', 'id');
	}

	public function getSmallTextAttribute()
	{
		return Str::limit($this->text, 100);
	}

	public function likedPosts()
	{
		return $this->belongsToMany(User::class, 'likes', 'post_id', 'user_id');
	}
}
