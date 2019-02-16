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
}
