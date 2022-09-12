<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth as AuthFacade;

class Auth extends Controller
{
    public function register(UserRequest $request): JsonResponse|Responsable
    {
        $params = $request->safe()->except('file');
        $user = User::create($params);
        $token = $user->createToken('auth-token');

        return $this->success([
            'user' => $user,
            'token' => $token->plainTextToken,
        ]);
    }

    public function login(LoginRequest $request): JsonResponse|Responsable
    {
        if (!AuthFacade::attempt($request->validated())) {
            abort(401, trans('auth.failed'));
        }

        $token = AuthFacade::user()->createToken('auth-token');

        return $this->success(['token' => $token->plainTextToken]);
    }

    public function getUsers(): JsonResponse|Responsable
    {
        return $this->success(User::select());
    }

    public function logout(): JsonResponse|Responsable
    {
        AuthFacade::user()->tokens()->delete();

        return $this->success(null);
    }
}
