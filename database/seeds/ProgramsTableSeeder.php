<?php

use Illuminate\Database\Seeder;
use App\Models\Program;
class ProgramsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Program::insert(
            [
                [
                    "code" => "PGDIT",
                    "program_name" => "PGDIT",
                    "status" => true,
                    "created_by" => 1
                ],
                [
                    "code" => "PMIT",
                    "program_name" => "PMIT",
                    "status" => true,
                    "created_by" => 1
                ]
            ]
        );
    }
}
