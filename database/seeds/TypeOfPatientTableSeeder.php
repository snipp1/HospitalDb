<?php

use App\TypeOfPatient;
use Illuminate\Database\Seeder;

class TypeOfPatientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //


        TypeOfPatient::create([
            'name' => 'Regular'
        ]);
        TypeOfPatient::create([
            'name' => 'Insurance'
        ]);
        TypeOfPatient::create([
            'name' => 'Intramural'
        ]);
    }
}
