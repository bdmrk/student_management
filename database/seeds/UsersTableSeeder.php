<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hasUser = User::count();
        if (!$hasUser) {

            $user = new User();
            $user->name = 'Admin';
            $user->email = 'admin@gmail.com';
            $user->password = bcrypt('123456');
            $user->created_by = 1;
            $user->save();
        }

    }
}
