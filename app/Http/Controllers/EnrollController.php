<?php

namespace App\Http\Controllers;

use App\Models\Enroll;
use App\Models\Student;
use Illuminate\Http\Request;
use Session;

class EnrollController extends Controller
{
    //

    private $enroll;
    private $student;
    private $data = [];
    public function index($id)
    {
         if(Session::get('student_id')){
             $this->student = Student::find(Session::get('student_id'));
             $this->data = [
                 'name'   => $this->student->name,
                 'email'  => $this->student->email,
                 'mobile' => $this->student->mobile,
             ];
         }
        return view('website.enroll.enroll', ['id' => $id,'data' => $this->data]);
    }

    public function createEnroll(Request $request, $id)
    {
        if(Session::get('student_id')){

            $this->student = Student::find(Session::get('student_id'));
        }
        else{
            $request->validate([
                'name' => 'required',
                'email' => 'required|unique:students,email',
                'mobile' => 'required',
            ]);
            $this->student = Student::newStudent($request);
            Session::put('student_id',$this->student->id);
            Session::put('student_name',$this->student->name);
        }

        $this->enroll =Enroll::newEnroll($request, $this->student->id,$id);



        return redirect('/course-registration-detail/'.$this->enroll->id);

    }
}
