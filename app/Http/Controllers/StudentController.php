<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\IpUtils;

class StudentController extends Controller
{
    function getStudents()
    {

        $student = Student::all();
        return view('index', ['student' => $student]);
    }

    function addStudent()
    {

        return view('add_Student');
    }

    function saveStudent(Request $request)
    {

        $recaptcha = $request->input('g-recaptcha-response');

        if (is_null($recaptcha)) {

            return redirect()->back()->with('message', "Please complete the recaptcha again to proceed. ");
        }

        $url = "https://www.google.com/recaptcha/api/siteverify";


        $params = [
            'secret' => config('services.recaptcha.secret'),
            'response' => $recaptcha,
            'remoteip' => IpUtils::anonymize($request->ip())
        ];

        // Make POST request to reCAPTCHA verification endpoint
        $response = Http::GET($url, $params);

        $result = json_decode($response->body());

        if ($response->status() == 200 && $result->success) {
            $student = new Student();
            $student->student_name = $request->name;
            $student->student_phone = $request->phone;
            $student->student_email = $request->email;
            $student->save();
            return redirect('/')->with('message', 'Student has been successfully added !!');

        } else {
            return redirect()->back()->with('message', "Please complete the reCAPTCHA again to proceed.");
        }
    }





    function editStudent(Request $request, $id)
    {
        $student = Student::find($id);

        return view('student_update', compact('student'));
    }

    function updateStudent(Request $request, $id)
    {
        $recaptcha = $request->input('g-recaptcha-response');

        if (is_null($recaptcha)) {

            return redirect()->back()->with('message', "Please complete the recaptcha again to proceed. ");
        }

        $url = "https://www.google.com/recaptcha/api/siteverify";


        $params = [
            'secret' => config('services.recaptcha.secret'),
            'response' => $recaptcha,
            'remoteip' => IpUtils::anonymize($request->ip())
        ];

        // Make POST request to reCAPTCHA verification endpoint
        $response = Http::GET($url, $params);

        $result = json_decode($response->body());

        if ($response->status() == 200 && $result->success) {
            $student = Student::find($id);
            $student->student_name = $request->name;
            $student->student_email = $request->email;
            $student->student_phone = $request->phone;
            $student->save();
            return redirect('/')->with('message', 'Student has been successfully updated!!');
        } else {
            return redirect()->back()->with('message', "Please complete the reCAPTCHA again to proceed.");
        }
    }
}
