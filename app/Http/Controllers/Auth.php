<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth as AuthFacade;

class Auth extends Controller
{
    public function register(UserRequest $request): string
    {
        $params = $request->safe()->except('file');
        $user = User::create($params);
        $token = $user->createToken('auth-token');

        return $this->success([
            'user' => $user,
            'token' => $token->plainTextToken,
        ]);
    }

    public function login(LoginRequest $request): string
    {
        if (!AuthFacade::attempt($request->validated())) {
            abort(401, trans('auth.failed'));
        }

        $token = AuthFacade::user()->createToken('auth-token');

        return $this->success(['token' => $token->plainTextToken]);
    }

    public function logout(): string
    {
        AuthFacade::user()->tokens()->delete();

        return $this->success(null);
    }
}
