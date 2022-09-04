<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Auth extends Controller
{
    public function register(): string
    {
        return 'register success';
    }

    public function login(): string
    {
        return 'login success';
    }

    public function logout(): string
    {
        return 'logout success';
    }
}
