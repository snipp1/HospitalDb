<?php

use Illuminate\Database\Seeder;
use App\Race;
class RaceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Race::create([
            'name'=>'African'
        ]);
        Race::create([
            'name'=>'Non-African'
        ]);

    }
}
