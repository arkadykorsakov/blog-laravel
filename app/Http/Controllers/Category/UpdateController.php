<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\UpdateRequest;
use App\Http\Resources\Category\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
	public function __invoke(UpdateRequest $request, Category $category)
	{
		$data = $request->validated();
		$candidate = Category::where('title', $data['title'])->first();

		if ($candidate) return response()->json(['message' => 'Такая категория уже существует']);
		$category->update($data);
		$category = $category->fresh();

		return new CategoryResource($category);
	}
}
