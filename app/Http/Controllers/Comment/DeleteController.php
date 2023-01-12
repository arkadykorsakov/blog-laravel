<?php

namespace App\Http\Controllers\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Comment\UpdateRequest;
use App\Http\Resources\Comment\CommentResource;
use App\Models\Comment;

class DeleteController extends Controller
{
	public function __invoke(Comment $comment)
	{
		$comment->delete();
		return response([]);
	}
}
