<?php

namespace App\Http\Factories;

use App\User;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory {
	public static function store($name, $email, $password, $user_level) {
		$user = new User;

		$user->name = $name;
		$user->email = $email;
		$user->password = Hash::make($password);
		$user->level = $user_level;

		$user->save();

		return $user;
	}

	public static function update(User $user, $name, $email, $user_level) {
		$user->name = $name;
		$user->email = $email;
		$user->level = $user_level;

		$user->save();

		return $user;
	}

	public static function destroy(User $user) {
		return $user->delete();;
	}
}