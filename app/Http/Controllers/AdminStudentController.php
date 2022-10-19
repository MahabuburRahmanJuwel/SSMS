<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use DB;

class AdminStudentController extends Controller
{
    //
    private $students;
       private  $message;
    public function manageStudent(){

       // $this->students = DB :: select('INSERT INTO Students'); //Row Query
       // $this->students = DB::table('students')->get('*');
       $this->students = Student::orderBy('id','desc')->get();  //Query Builder
        return view('admin.student.manage',['students'=>$this->students]);//orm
    }

    public function updateStatus($id)
    {
         $this->message=Student::updateStatus($id);
         return redirect()->back()->with('message',$this->message);
    }
}
