<?php

namespace App\Http\Resources\Post;

use App\Http\Resources\Category\CategoryResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PostsResource extends JsonResource
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
			'id' => $this->id,
			'title' => $this->title,
			'category' => new CategoryResource($this->category),
			'text' => $this->smallText
		];
	}
}

// По роуту со всеми постами пользователь получает список постов с: ID поста, его названием, первыми 100 символами текста и количеством комментариев и лайков;
