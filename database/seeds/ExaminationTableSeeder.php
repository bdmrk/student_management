<?php

use Illuminate\Database\Seeder;
use App\Models\Examinations;

class ExaminationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = \Carbon\Carbon::now();

        $exams = Examinations::count();
        if(!$exams) {
            $exam = Examinations::insert([
                ['name' => 'SSC', 'level' => 'SSC', 'created_at' =>$now, 'updated_at'=>$now],
                ['name' => 'Dakhil', 'level' => 'SSC', 'created_at' =>$now, 'updated_at'=>$now],
                ['name' => 'Vocational', 'level' => 'SSC', 'created_at' =>$now, 'updated_at'=>$now],
                ['name' => 'O Level', 'level' => 'SSC', 'created_at' =>$now, 'updated_at'=>$now],
                ['name' => 'HSC', 'level' => 'HSC', 'created_at' =>$now, 'updated_at'=>$now],
                ['name' => 'Diploma', 'level' => 'HSC', 'created_at' =>$now, 'updated_at'=>$now],
                ['name' => 'Alim', 'level' => 'HSC', 'created_at' =>$now, 'updated_at'=>$now],
                ['name' => 'A Level', 'level' => 'HSC', 'created_at' =>$now, 'updated_at'=>$now],
                ['name' => 'BBS', 'level' => 'Graduation', 'created_at' =>$now, 'updated_at'=>$now],
                ['name' => 'BSS', 'level' => 'Graduation', 'created_at' =>$now, 'updated_at'=>$now],
                ['name' => 'BSC', 'level' => 'Graduation', 'created_at' =>$now, 'updated_at'=>$now],
                ['name' => 'BBA', 'level' => 'Graduation', 'created_at' =>$now, 'updated_at'=>$now],
                ['name' => 'BA', 'level' => 'Graduation', 'created_at' =>$now, 'updated_at'=>$now],
                ['name' => 'MBS', 'level' => 'Masters', 'created_at' =>$now, 'updated_at'=>$now],
                ['name' => 'MSS', 'level' => 'Masters', 'created_at' =>$now, 'updated_at'=>$now],
                ['name' => 'MSC', 'level' => 'Masters', 'created_at' =>$now, 'updated_at'=>$now],
                ['name' => 'MBA', 'level' => 'Masters', 'created_at' =>$now, 'updated_at'=>$now],
                ['name' => 'MA', 'level' => 'Masters', 'created_at' =>$now, 'updated_at'=>$now],

            ]);
        }
    }
}
