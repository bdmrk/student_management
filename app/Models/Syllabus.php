<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Syllabus extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    
    protected $table = 'syllabus';
    public $timestamps = true;

    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }
    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    public function courses()
    {
        return $this->hasMany(Course::class, 'syllabus_id');
    }
}
