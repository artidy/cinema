<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Auth extends Controller
{
    public function register(): string
    {
        return $this->created(["token" => 'register success']);
    }

    public function login(): string
    {
        return $this->success('login success');
    }

    public function logout(): string
    {
        return $this->error('не удалось выполнить запрос');
    }
}
