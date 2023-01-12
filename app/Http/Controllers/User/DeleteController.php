<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DeleteController extends Controller
{
	public function __invoke(User $user)
	{
		$user->delete();
		return response([]);
	}
}
