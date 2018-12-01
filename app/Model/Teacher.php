<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = ['first_name', 'second_name','designation', 'contact_number', 'email', 'father_name', 'mother_name', 'address', 'teacher_photo', 'gender', 'status'];
}
