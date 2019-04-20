<?php

use App\Models\Teacher;
use Illuminate\Database\Seeder;


class TeacherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for($i = 0; $i <= 9; $i++) {
            $teachers = new Teacher();
            $teachers->full_name = $faker->name;
            $teachers->dob = "1975-01-01";
            $teachers->designation = "Asst. Professor";
            $teachers->contact_number = "0171".$faker->numberBetween(1000000, 9999999);
            $teachers->email = $faker->unique()->email;

            $teachers->password = bcrypt('123456');

            $teachers->father_name = $faker->firstNameMale;
            $teachers->mother_name = $faker->firstNameFemale;
            $teachers->address = "Dhaka";
            $teachers->teacher_photo = "images/avatar.png";
            $teachers->gender = "Male";
            $teachers->status = 1;
            $teachers->created_by = 1;
            $teachers->save();

        }

    }
}
