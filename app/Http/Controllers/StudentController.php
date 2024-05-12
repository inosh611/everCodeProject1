<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    function getStudents(){

        $student = Student::all();
        return view('index',['student'=>$student]);
    }

    function addStudent(){

        return view('add_Student');
    }

    function saveStudent(Request $request){
       $student = new Student();
       $student->student_name = $request->name;
       $student->student_phone = $request->phone;
       $student->student_email = $request->email;
       $student->save();
       return redirect('/')->with('message','Student has been successfully added !!');
    }
    function editStudent(Request $request , $id){
        $student = Student::find($id);

        return view('student_update',compact('student'));
    }

    function updateStudent(Request $request, $id){

        $student = Student::find($id);
        $student->student_name = $request->name;
        $student->student_email = $request->email;
        $student->student_phone = $request->phone;
        $student->save();

        return redirect('/')->with('message','Student has been successfully updated!!');
    }
}
