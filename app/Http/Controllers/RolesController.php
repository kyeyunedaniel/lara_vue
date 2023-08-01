<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RolesController extends Controller
{
    //
    public function getRole(Request $request, $id)
    {
        $roles_name = Role::where('user_id', $id)->pluck('role_name');
        $data_ar = array(
            'roles_name' => $roles_name
        );
        return $data_ar;
        // return ('user data');
    }
}
