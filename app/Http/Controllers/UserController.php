<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function login(Request $request)
    {
        $user = User::where(['email' => $request->email])->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return "Username and password do not match";
        } else {

            $request->session()->put('user',$user);
            return redirect('/');
        }
    }
}
