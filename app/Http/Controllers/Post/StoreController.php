<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;

class StoreController extends Controller
{
	public function __invoke(StoreRequest $request)
	{
		$data = $request->validated();
		$data['user_id'] = auth()->user()->id;
		$post = Post::create($data);
		return new PostResource($post);
	}
}
