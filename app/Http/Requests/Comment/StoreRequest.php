<?php

namespace App\Http\Requests\Comment;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, mixed>
	 */
	public function rules()
	{
		return [
			'text' => 'required|string|min:10',
			'post_id' => 'required|integer|exists:posts,id'
		];
	}

	public function messages()
	{
		return [
			'text.required' => 'Обязательное поле',
			'text.string' => 'Строковое поле',
			'text.min' => 'Минимум 10 символов',
			'post_id.required' => 'Обязательное поле',
			'post_id.integer' => 'Числовое поле',
			'text.exists' => 'Поста не существует'
		];
	}
}
