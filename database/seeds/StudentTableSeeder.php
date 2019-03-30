<?php

use Illuminate\Database\Seeder;


class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $student = \App\Models\Student::create([
            "full_name" => $faker->name,
            "email" => $faker->unique()->email,
            "contact_number" => "0171".$faker->numberBetween(1000000, 9999999),
            "father_name" => $faker->firstNameMale,
            "mother_name" => $faker->firstNameFemale,
            "dob" => "1988-01-11",
            "gender" => "Male",
            "blood_group" => "A+",
            "religion" => "Islam",
            "nationality" => "Bangladeshi",
            "nid" => "29393844848844",
            "present_address" => "Dhaka",
            "permanent_address" => "Dhaka",
            "student_photo" => "avatar.png",
            "program_id" => 1,
            "is_active" => 1,
            "is_selected" =>0,
            "created_by" =>1,
            "status" => \App\Helpers\Enum\StudentStatus::Applied,
            "password" => bcrypt("123456")
        ]);
        
        \App\Models\AcademicInfo::insert([
            [
            'student_id' => $student->id,
            'examination' => "S.S.C",
            'board' => "Dhaka",
            'institute' => "",
            'roll_no' => $faker->numberBetween(100000, 999999),
            'result' => $faker->numberBetween(3, 5),
            'group' => "Science",
            'subject' => "",
            'passing_year' => "2005",
            'course_duration' => ""
            ],
            [
                'student_id' => $student->id,
                'examination' => "H.S.C",
                'board' => "Dhaka",
                'institute' => "",
                'roll_no' => $faker->numberBetween(100000, 999999),
                'result' => $faker->numberBetween(3, 5),
                'group' => "Science",
                'subject' => "",
                'passing_year' => "2007",
                'course_duration' => ""

            ],
            [
            'student_id' => $student->id,
            'examination' => "Honors",
            'board' => "",
            'institute' => "National University",
            'roll_no' => $faker->numberBetween(100000, 999999),
            'result' => $faker->numberBetween(3, 4),
            'group' => "",
            'subject' => "Computer Science",
            'passing_year' => "2007",
            'course_duration' => "4 Years"

            ],
            [
                'student_id' => $student->id,
                'examination' => "Masters",
                'board' => "",
                'institute' => "National University",
                'roll_no' => $faker->numberBetween(100000, 999999),
                'result' => $faker->numberBetween(3, 4),
                'group' => "",
                'subject' => "Computer Science",
                'passing_year' => "2007",
                'course_duration' => "1 Year"

            ]
        ]);

    }
}
