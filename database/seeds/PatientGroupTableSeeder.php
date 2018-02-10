<?php

use Illuminate\Database\Seeder;
use App\PatientGroup;
class PatientGroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        PatientGroup::create([
            'name'=>'Ghanaian Adult'
        ]);
        PatientGroup::create([
            'name'=>'Ghanaian Child'
        ]);
        PatientGroup::create([
            'name'=>'Foreign Adult'
        ]);
        PatientGroup::create([
            'name'=>'Foreign Child'
        ]);

    }
}
