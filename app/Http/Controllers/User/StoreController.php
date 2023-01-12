<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Models\User;

class StoreController extends Controller
{
	public function __invoke(StoreRequest $request)
	{
		$data = $request->validated();

		$candidate = User::where('login', '=', $data['login'])->first();
		if ($candidate) return response()->json(['message' => 'Такой логин уже существует'], 409);

		$data['password'] = bcrypt($data['password']);
		$user = User::create($data);

		$token = auth()->tokenById($user->id);

		return response(['access_token' => $token]);
	}
}
