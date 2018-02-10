<?php

use App\ClinicalVisit;
use Illuminate\Database\Seeder;

class ClinicalVisitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        ClinicalVisit::create([
            'name'=>'Antenatal'
        ]);
        ClinicalVisit::create([
            'name'=>'Postnatal'
        ]);
    }
}
