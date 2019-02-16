<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Program extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $table = 'programs';
    public $timestamps = true;
}
