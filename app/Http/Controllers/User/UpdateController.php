<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateRequest;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UpdateController extends Controller
{
	public function __invoke(UpdateRequest $request, User $user)
	{
		$data = $request->validated();

		$old_password = $data['old_password'];
		unset($data['old_password']);

		if (Hash::check($old_password, $user->password)) {
			if (!isset($data['password'])) {
				$data['password'] = $user->password;
			} else {
				$data['password'] = Hash::make($data['password']);
			}
			$user->update($data);
			$user = $user->fresh();
			return  new UserResource($user);
		} else {
			return response()->json(['message' => 'Неправильный пароль'], 401);
		}
	}
}
