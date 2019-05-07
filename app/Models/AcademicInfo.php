<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademicInfo extends Model
{
    protected $table = 'academic_informations';
    public $timestamps = true;

    public function board()
    {
        return $this->belongsTo(Board::class, 'board_id');
    }

    public function exam()
    {
        return $this->belongsTo(Examinations::class, 'examination_id');
    }
}
