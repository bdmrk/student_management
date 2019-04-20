<?php

use Illuminate\Database\Seeder;
use App\Models\Board;

class BoardTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $now = \Carbon\Carbon::now();

        $boards = Board::count();
        if(!$boards) {
            $board = Board::insert([
                ['name' => 'Dhaka','created_at' =>$now, 'updated_at'=>$now],
                ['name' => 'Comilla','created_at' =>$now, 'updated_at'=>$now],
                ['name' => 'Chittagong','created_at' =>$now, 'updated_at'=>$now],
                ['name' => 'Rajshahi','created_at' =>$now, 'updated_at'=>$now],
                ['name' => 'Jessore','created_at' =>$now, 'updated_at'=>$now],
                ['name' => 'Sylhet','created_at' =>$now, 'updated_at'=>$now],
                ['name' => 'Dinajpur','created_at' =>$now, 'updated_at'=>$now],
                ['name' => 'Madrasah','created_at' =>$now, 'updated_at'=>$now],
                ['name' => 'Barisal','created_at' =>$now, 'updated_at'=>$now]

            ]);
        }

    }
}
