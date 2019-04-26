<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';
    public $timestamps = true;

    public function syllabus()
    {
        return $this->belongsTo(Syllabus::class, 'syllabus_id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    public function coursePrerequisite()
    {
        return $this->hasMany(CoursePrerequisite::class, 'course_id');
    }
}
