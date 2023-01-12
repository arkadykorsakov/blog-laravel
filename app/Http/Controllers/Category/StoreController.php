<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Resources\Category\CategoryResource;
use App\Models\Category;

class StoreController extends Controller
{
	public function __invoke(StoreRequest $request)
	{
		$data = $request->validated();

		$candidate = Category::where('title', $data['title'])->first();
		if ($candidate) return response()->json(['message' => 'Такая категория уже существует']);

		$category = Category::create($data);
		return new CategoryResource($category);
	}
}
