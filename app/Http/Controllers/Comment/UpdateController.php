<?php

namespace App\Http\Controllers\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Comment\UpdateRequest;
use App\Http\Resources\Comment\CommentResource;
use App\Models\Comment;

class UpdateController extends Controller
{
	public function __invoke(UpdateRequest $request, Comment $comment)
	{
		$data = $request->validated();
		$comment->update($data);
		$comment = $comment->fresh();
		return new CommentResource($comment);
	}
}
