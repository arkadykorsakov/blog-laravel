<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Resources\Post\PostsResource;
use App\Models\Post;

class IndexController extends Controller
{
	public function __invoke()
	{
		$posts = Post::all();
		return PostsResource::collection($posts);
	}
}
