<?php

namespace App\Http\Controllers;

use App\Models\Enroll;
use Session;


class StudentDashboardController
{

    public $enrolledCourses;
    public function index(){
        return view('student.home.home');
    }
    public function courses(){
        $this->enrolledCourses =Enroll::where('student_id',Session::get('student_id'))->get();
        return view('student.enrolled.courses',[
            'enrolledCourses' => $this->enrolledCourses,
        ]);
    }

}
