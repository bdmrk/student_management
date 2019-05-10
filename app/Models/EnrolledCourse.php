<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EnrolledCourse extends Model
{
    protected $table = 'enrolled_course';
    public $timestamps = true;

    public function offer()
    {
        return $this->belongsTo(Offer::class, 'offer_id');
    }
    public function enroll()
    {
        return $this->belongsTo(Enroll::class, 'enroll_id');
    }
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }


}
