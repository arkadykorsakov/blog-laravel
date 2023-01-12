<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	public function rules()
	{
		return [
			'title' => 'required|string|min:6',
			'text' => 'required|string|min:150',
			'category_id' => 'required|integer|exists:categories,id',
		];
	}

	public function messages()
	{
		return [
			'title.required' => 'Обязательное поле',
			'text.required' => 'Обязательное поле',
			'category_id.required' => 'Обязательное поле',
			'title.string' => 'Строковый тип данных',
			'text.integer' => 'Строковый тип данных',
			'category_id.string' => 'Числовой тип данных',
			'title.min' => 'Минимум 6 символа',
			'text.min' => 'Минимум 150 символов',
			'category_id.exists' => 'Категории не существует',
		];
	}
}
