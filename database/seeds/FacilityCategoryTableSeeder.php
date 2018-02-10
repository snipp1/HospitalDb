<?php

use App\FacilityCategory;
use Illuminate\Database\Seeder;

class FacilityCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        //
        FacilityCategory::create([
            'name'=>'Clinic'
        ]);
        FacilityCategory::create([
            'name'=>'Hospital'
        ]);
        FacilityCategory::create([
            'name'=>'Health Center'
        ]);
        FacilityCategory::create([
            'name'=>'Maternity Home'
        ]);
        FacilityCategory::create([
            'name'=>'Medical Centre'
        ]);
        FacilityCategory::create([
            'name'=>'PolyClinic'
        ]);
        FacilityCategory::create([
            'name'=>'Teaching Hospital'
        ]);
        FacilityCategory::create([
            'name'=>'N/A'
        ]);
        FacilityCategory::create([
            'name'=>'Other'
        ]);
    }
}
