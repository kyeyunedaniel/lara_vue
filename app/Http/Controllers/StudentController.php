<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Students;
use PhpParser\Node\Stmt\Return_;

class StudentController extends Controller
{
    //
    public function save_student(Request $request){
        // return ($request);
        $student = new Student;
        $student->name = request()->name;
        $student->email = request()->email;
        $student->phone_number = request()->phone_number;
        $student->save();
        
        return ('student saved');

    }
}
