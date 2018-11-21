<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    public $table = 'semester';
    protected $fillable = ['name', 'start_date', 'end_date', 'publication_status'];
}
