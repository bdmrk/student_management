<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Teacher extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = "teachers";

    protected $fillable = ['first_name', 'second_name','designation', 'contact_number', 'email', 'father_name', 'mother_name', 'address', 'teacher_photo', 'gender', 'status'];
}
