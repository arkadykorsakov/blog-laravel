<?php

namespace App\Http\Resources\Post;

use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Comment\CommentResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
	/**
	 * Transform the resource into an array.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
	 */
	public function toArray($request)
	{
		return [
			'name' => $this->user->name,
			'surname' => $this->user->surname,
			'title' => $this->title,
			'text' => $this->text,
			'category' => new CategoryResource($this->category),
			'comments' => CommentResource::collection($this->comments)
		];
	}
}

// По роуту конкретного поста пользователь получает имя и фамилию автора поста, название поста, полный его текст, список комментариев;