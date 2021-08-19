<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthService {
    public function register($userDto)
    {
        $userDto['password'] = Hash::make($userDto['password']);
        $user = User::create($userDto);
        return $user;
    }

    public function login($userDto)
    {
        $token = app('auth')->attempt($userDto);
        if (!$token) {
            abort(400, 'Invalid credentials');
        }
        return $token;
    }

    public function me()
    {
        return app('auth')->user();
    }

    public function logout()
    {
        return app('auth')->logout();
    }
}
