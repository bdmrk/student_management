<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);
         $this->call( ProgramsTableSeeder::class);
         $this->call( StudentTableSeeder::class);
         $this->call( TeacherTableSeeder::class);
         $this->call(BoardTableSeeder::class);
         $this->call(ExaminationTableSeeder::class);
    }
}
