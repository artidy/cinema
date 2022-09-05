<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth as AuthFacade;
use Illuminate\Http\Request;

class Auth extends Controller
{
    public function register($request): string
    {
        $params = $request->safe()->except('file');
        $user = User::create($params);
        $token = $user->createToken('auth-token');

        return $this->success([
            'user' => $user,
            'token' => $token->plainTextToken,
        ]);
    }

    public function login($request): string
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
