<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;


class Teacher extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    protected $guard = 'teacher';
    protected $dates = ['deleted_at'];
    protected $table = "teachers";

    protected $fillable = ['full_name', 'dob','designation', 'contact_number', 'email', 'father_name', 'mother_name', 'address', 'teacher_photo', 'gender', 'status'];

    public function scopeActive($query)
    {
        return $query->where('status', true);

    }


}
