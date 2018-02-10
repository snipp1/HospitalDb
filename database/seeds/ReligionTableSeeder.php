<?php

use Illuminate\Database\Seeder;
use App\Religion;
class ReligionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Religion::create([
            'religion_name'=>'Christian'
        ]);
        Religion::create([
            'religion_name'=>'Muslim'
        ]);
        Religion::create([
            'religion_name'=>'Traditionalist'

        ]);
        Religion::create([
            'religion_name'=>'Budaism'
        ]);
    }
}
