<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\UpdateRequest;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;

class UpdateController extends Controller
{
	public function __invoke(UpdateRequest $request, Post $post)
	{
		$data = $request->validated();
		$post->update($data);
		$post = $post->fresh();
		return new PostResource($post);
	}
}
