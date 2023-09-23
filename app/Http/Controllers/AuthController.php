<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Modules\AuthModule;

class AuthController extends Controller
{
   
    public function loginAccount(Request $request)
    {
        return AuthModule::loginAccount($request->all());
    }
}
