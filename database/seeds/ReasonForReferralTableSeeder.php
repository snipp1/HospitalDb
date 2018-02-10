<?php

use App\ReasonForReferral;
use Illuminate\Database\Seeder;

class ReasonForReferralTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
       ReasonForReferral::create([
            'name'=>'Antenatal'
        ]);
       ReasonForReferral::create([
            'name'=>'Delivery'
        ]);
       ReasonForReferral::create([
            'name'=>'Postnatal'
        ]);
       ReasonForReferral::create([
            'name'=>'N/A'
        ]);
    }
}
