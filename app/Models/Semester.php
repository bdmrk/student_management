<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Semester extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'semesters';
    public $timestamps = true;

    public function scopeActive() {
        return $this->where('status', true);
    }

    public function enroll()
    {
        return $this->hasMany(Enroll::class, 'semester_id');
    }

}
