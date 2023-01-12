<?php

namespace App\Http\Requests\User;

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

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, mixed>
	 */
	public function rules()
	{
		return [
			'name' => 'required|string|min:3',
			'surname' => 'required|string|min:3',
			'old_password' => 'required|string|min:8',
			'password' => 'nullable|string|confirmed|min:8',
		];
	}

	public function messages()
	{
		return [
			'name.required' => 'Обязательное поле',
			'surname.required' => 'Обязательное поле',
			'old_password.required' => 'Обязательное поле',
			'name.string' => 'Строковый тип данных',
			'surname.string' => 'Строковый тип данных',
			'old_password.string' => 'Строковый тип данных',
			'password.string' => 'Строковый тип данных',
			'name.min' => 'Минимум 3 символа',
			'surname.min' => 'Минимум 3 символа',
			'old_password.min' => 'Минимум 8 символов',
			'password.min' => 'Минимум 8 символов',
			'password.confirmed' => 'Пароли не совпадают',
		];
	}
}
