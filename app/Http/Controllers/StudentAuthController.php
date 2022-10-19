<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\Student;

class StudentAuthController extends Controller
{
    //
    private $student;

    public function login(Request $request)
    {

         $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $this->student = Student::where('email', $request->email)->first();
        if ($this->student) {
            if($this->student->status ==  1){
                if (password_verify($request->password, $this->student->password))
                {
                    Session::put('student_id', $this->student->id);
                    Session::put('student_name', $this->student->name);


                    return redirect('/student-dashboard');
                }
                else
                {
                    return redirect()->back()->with('message', 'Your password is invalid.');
                }

            }
            else{
                return redirect()->back()->with('message', 'your account is banned.please contact with admin');

            }


        } else {
            return redirect()->back()->with('message', 'your account is Invalid!');
        }
        //   return redirect('/');
    }

    public  function  register(Request $request){
        $request->validate([
            'name' => 'required|name',
            'email' => 'required|email:rfs,dns|unique:students,email',
            'password' => 'required',
            'mobile' => 'required'
        ]);

        $this->student=Student::newStudent($request);
        Session::put('student_id',$this->student->id);
        Session::put('student_name',$this->student->name);
        return redirect('/student-dashboard');


    }

    public function logout()
    {
        Session::forget('student_id');
        Session::forget('student_name');

        return redirect('/');
    }
}
