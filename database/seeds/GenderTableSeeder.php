<?php

use App\Gender;
use Illuminate\Database\Seeder;

class GenderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Gender::create([
            'gender_name'=>'Male',
        ]);Gender::create([
            'gender_name'=>'Female'
        ]);
    }
}
