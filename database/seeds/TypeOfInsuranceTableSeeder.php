<?php

use App\TypeOfInsurance;
use Illuminate\Database\Seeder;

class TypeOfInsuranceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        TypeOfInsurance::create([
            'name'=>'Acacia Health Insurance'
        ]);
        TypeOfInsurance::create([
            'name'=>'Apex Health Insurance'
        ]);
        TypeOfInsurance::create([
            'name'=>'Cosmopolitan Health Insurance'
        ]);
        TypeOfInsurance::create([
            'name'=>'Empire Health Insurance'
        ]);
        TypeOfInsurance::create([
            'name'=>'GLICO Health Insurance'
        ]);
        TypeOfInsurance::create([
            'name'=>'Kaiser Global Health Limited'
        ]);
        TypeOfInsurance::create([
            'name'=>'Liberty Medical Health Scheme'
        ]);
        TypeOfInsurance::create([
            'name'=>'Metropolitan Health Insurance'
        ]);
        TypeOfInsurance::create([
            'name'=>'NMH Nationwide Medical Health Insurance'
        ]);
        TypeOfInsurance::create([
            'name'=>'Primier Health Insurance'
        ]);
        TypeOfInsurance::create([
            'name'=>'Universal Health Insurance'
        ]);
        TypeOfInsurance::create([
            'name'=>'Vitality Health Systems'
        ]);
        TypeOfInsurance::create([
            'name'=>'Phoenix Health Insurance'
        ]);
        TypeOfInsurance::create([
            'name'=>'Ace Medical Insurance'
        ]);
    }
}
