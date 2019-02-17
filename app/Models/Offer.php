<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $table = 'offers';
    public $timestamps = true;

    public function course() {
        return $this->belongsTo(Course::class, 'course_id');
    }
    public function syllabus() {
        return $this->belongsTo(Syllabus::class, 'syllabus_id');
    }

    public function semester() {
        return $this->belongsTo(Semester::class, 'semester_id');
    }
    
    public function teacher() {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }


}
