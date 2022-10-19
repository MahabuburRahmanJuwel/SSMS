<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Enroll;

class StudentCourseController extends Controller
{
    //
    private $result;
    private $course;
    private $enroll;

    public function detail($id)
    {
        $this->enroll = Enroll::find($id);
        $this->course = Course::find($this->enroll->course_id);

        $this->result = [
            'title' =>$this->course->title,
            'teacher_name' => $this->course->teacher->name,
            'start_date'   =>  $this->course->start_date,
            'fee'   =>  $this->course->fee,
            'enroll_status'   =>  $this->enroll->enroll_status,

        ];
        return view('student.course.detail' ,['result'=> $this->result]);
    }
}
