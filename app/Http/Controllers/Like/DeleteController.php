<?php

namespace App\Http\Controllers\Like;

use App\Http\Controllers\Controller;
use App\Models\Like;
use App\Models\Post;

class DeleteController extends Controller
{
	public function __invoke(Post $post)
	{
		$candidate = Like::where('post_id', $post->id)->where('user_id', auth()->user()->id)->first();
		if ($candidate) {
			auth()->user()->LikedPosts()->detach($post);
			return response()->json(["message" => "Вы удалили лайк"]);
		} else {
			return response()->json(["message" => "Вы не ставили лайк"]);
		}
	}
}
