<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    public function save(Request $request){
        $user_save = new User;
        $user_save->name = request()->name;
        $user_save->email = request()->email;
        $user_save->password = request()->password;

        return($user_save->name = request()->name);
    }
}
