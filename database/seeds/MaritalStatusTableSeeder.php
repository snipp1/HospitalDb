<?php

use App\MaritalStatus;
use Illuminate\Database\Seeder;

class MaritalStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        //
        MaritalStatus::create([
            'ms_name'=>'Single'
        ]);
        MaritalStatus::create([
            'ms_name'=>'Married'
        ]);
        MaritalStatus::create([
            'ms_name'=>'Co-habitting'
        ]);
        MaritalStatus::create([
            'ms_name'=>'Seperated'
        ]);
        MaritalStatus::create([
            'ms_name'=>'Divoced'
        ]);
    }
}
