<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enroll extends Model
{
    protected $table = 'enroll';
    public $timestamps = true;

    public function semester()
    {
        return $this->belongsTo(Semester::class, 'semester_id');
    }
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
    public function enrolledCourse()
    {
        return $this->belongsTo(EnrolledCourse::class, 'enroll_id');
    }


}
