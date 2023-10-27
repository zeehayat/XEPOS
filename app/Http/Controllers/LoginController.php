<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Services\LoginService;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login(LoginRequest $request){

        return LoginService::login($request->all());
    }
}
