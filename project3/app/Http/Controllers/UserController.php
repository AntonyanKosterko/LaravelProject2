<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function logout(Request $request){
        $user = User::where('remember_token', $request->token)->first();
        $user->remember_token = null;
        $user->save();
    }
}
