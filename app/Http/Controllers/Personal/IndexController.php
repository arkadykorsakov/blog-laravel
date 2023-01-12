<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;
use App\Http\Resources\Comment\CommentResource;
use App\Http\Resources\Post\PostResource;
use Illuminate\Http\Request;

class IndexController extends Controller
{
	public function __invoke()
	{
		$likedPosts = auth()->user()->LikedPosts;
		$commentPosts = auth()->user()->comments;

		$linksLikedPosts = [];
		foreach ($likedPosts as $post) {
			array_unshift($linksLikedPosts, $post->id);
		}

		$linksCommentPosts = [];
		foreach ($commentPosts as $comment) {
			array_unshift($linksCommentPosts, $comment->post_id);
		}

		return response()->json(['likes' => $linksLikedPosts, 'comments' => $linksCommentPosts]);
	}
}
