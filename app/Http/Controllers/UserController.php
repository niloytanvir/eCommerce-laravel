<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function login(Request $req){

        return User::where(['email'=>$req->email])->first();
        if( !$user || !Hash::check( $req->password, $user->password ))
        {
            return "user name or password is incorrect";
        }
        else{
            $req->session()->put('user', $user);
            return redirect('/');
        }
    }
}
