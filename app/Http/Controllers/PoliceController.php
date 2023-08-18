<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Police;

class PoliceController extends Controller
{
    //
    public function create_data(Request $request)
    {
        try {
            $police = new Police;
            $police->first_name = request()->first_name;
            $police->last_name = request()->last_name;
            $police->gender = request()->gender;
            $police->citizenship = request()->citizenship;
            $police->occupation = request()->occupation;
            $police->nin = request()->nin;
            $police->marital_status = request()->marital_status;
            $police->residence = request()->first_name;
            $police->save();
        } catch (\Exception $e) {
            //   return('there is an error '.$e); 
              return response()->json(['error_message' => 'an error occured'], 500);

        }

        // return ('hello');
        return response()->json(['action_message' => 'user data inserted'],200);
    }
}
