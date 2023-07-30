<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RolesController extends Controller
{
    //
    public function getRole(Request $request,  $user_id){
       $roles = Role::where('user_id',$user_id)->get('role_name');  
       return $roles;   
    // return ('user data');
    }

}
