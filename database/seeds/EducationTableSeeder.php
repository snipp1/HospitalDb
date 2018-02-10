<?php

use App\Education;
use Illuminate\Database\Seeder;

class EducationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Education::create([
            'edu_name'=>'Primary'
        ]);
        Education::create([
            'edu_name'=>'JHS/Middle School'
        ]);
        Education::create([
            'edu_name'=>'SHS/O-A Level'
        ]);
        Education::create([
            'edu_name'=>'Tertiary'
        ]);
        Education::create([
            'edu_name'=>'Non'
        ]);
    }
}
