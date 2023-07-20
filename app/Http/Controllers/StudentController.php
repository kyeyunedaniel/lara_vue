<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
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
    public function list_students(){
        $students = Student::All();
        // $data = array(
        //     'students'=>$students
        // );
        // return response()->json($data);
        return $students;

    }

    public function edit_students($id){
        $edit = Student::FindOrfail($id);
        return ($edit);
    }
    public function save_edited($id){
        // dd('success');
        // $id = request()->edit_id;
        $edit_saved = Student::FindOrfail($id);
        $edit_saved->name = request()->name;
        $edit_saved->email = request()->email;
        $edit_saved->phone_number = request()->phone_number;
        $edit_saved->update();
        return ('data edited');
    }

    public function delete_student($id){
        $student = Student::findorfail($id);
        $student->delete();
        return ('user has been deleted');
    }
}
