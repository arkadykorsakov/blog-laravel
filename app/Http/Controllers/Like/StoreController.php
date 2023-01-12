<?php

namespace App\Http\Controllers\Like;

use App\Http\Controllers\Controller;
use App\Http\Resources\Post\PostResource;
use App\Models\Like;
use App\Models\Post;

class StoreController extends Controller
{
	public function __invoke(Post $post)
	{
		if ($post->user_id === auth()->user()->id) return response()->json(["message" => "Нельзя поставить лайк себе"]);
		$candidate = Like::where('post_id', $post->id)->where('user_id', auth()->user()->id)->first();
		if ($candidate) return response()->json(["message" => "Нельзя поставить 2 лайка"]);
		auth()->user()->likedPosts()->toggle($post->id);
		return response()->json(["message" => "Вы поставили лайк"]);
	}
}
