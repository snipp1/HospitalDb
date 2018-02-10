<?php

use App\NextOfKinRelationship;
use Illuminate\Database\Seeder;

class NextOfKinRelationshipTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //















        NextOfKinRelationship::create([
            'name'=>'Aunty'
        ]);
        NextOfKinRelationship::create([
            'name'=>'Brother'
        ]);
        NextOfKinRelationship::create([
            'name'=>'Cousin'
        ]);
        NextOfKinRelationship::create([
            'name'=>'Daughter'
        ]);
        NextOfKinRelationship::create([
            'name'=>'Father'
        ]);
        NextOfKinRelationship::create([
            'name'=>'Friend'
        ]);
        NextOfKinRelationship::create([
            'name'=>'Husband'
        ]);
        NextOfKinRelationship::create([
            'name'=>'Mother'
        ]);
        NextOfKinRelationship::create([
            'name'=>'Nephew'
        ]);
        NextOfKinRelationship::create([
            'name'=>'Niece'
        ]);
        NextOfKinRelationship::create([
            'name'=>'Relative'
        ]);
        NextOfKinRelationship::create([
            'name'=>'Sister'
        ]);
        NextOfKinRelationship::create([
            'name'=>'Son'
        ]);
        NextOfKinRelationship::create([
            'name'=>'Uncle'
        ]);
        NextOfKinRelationship::create([
            'name'=>'Wife'
        ]);

    }
}
