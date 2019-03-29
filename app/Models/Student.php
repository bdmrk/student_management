<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Student extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    protected $guard = 'student';
    protected $dates = ['deleted_at'];
    protected $table = 'students';
    public $timestamps = true;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];


    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }
    public function academicInfo()
    {
        return $this->hasMany(AcademicInfo::class, 'student_id');
    }
    public function enrolledCourse()
    {
        return $this->hasMany(EnrolledCourse::class, 'student_id');
    }
}
