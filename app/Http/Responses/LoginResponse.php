<?php

namespace App\Http\Responses;
use Illuminate\Support\Facades\Auth;

use Laravel\Fortify\Contracts\LoginResponse as ContractsLoginResponse;

class LoginResponse implements ContractsLoginResponse
{
    public function toResponse($request)
    {
        if (Auth::user()->hasRole('Administrador')) {
            return redirect()->route('admin.home');
        } else {
            return redirect()->route('home');
        }
    }
}