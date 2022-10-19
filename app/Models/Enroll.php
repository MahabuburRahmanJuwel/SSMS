<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enroll extends Model
{
    use HasFactory;

    private static $enroll;

    public static function newEnroll($request, $studentId, $courseId)
    {
        self::$enroll = new Enroll();
        self::$enroll->course_id = $courseId;
        self::$enroll->student_id = $studentId;
        self::$enroll->enroll_date = date('Y-m-d');
        self::$enroll->enroll_timestamp = strtotime(date('Y-m-d'));
        self::$enroll->payment_type = $request->payment_type;
        self::$enroll->save();


        return self::$enroll;

    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public static function  updateEnrollStatus  ($id)
    {
        self::$enroll = Enroll::find($id);
        if(self::$enroll->enroll_status == 'Pending'){
            self::$enroll->enroll_status  = 'Complete';
            self::$enroll->payment_amount = self::$enroll->course->fee;
            self::$enroll->save();
            return "Enroll Status Complete Sucessfully";

        }

    }
}
