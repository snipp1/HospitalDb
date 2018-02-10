<?php

use App\Parity;
use Illuminate\Database\Seeder;

class ParityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //
        Parity::create([
            'parity_name'=>'1'
        ]);
        Parity::create([
            'parity_name'=>'2'
        ]);
        Parity::create([
            'parity_name'=>'3'
        ]);
        Parity::create([
            'parity_name'=>'4'
        ]);
        Parity::create([
            'parity_name'=>'5'
        ]);
        Parity::create([
            'parity_name'=>'6'
        ]);
        Parity::create([
            'parity_name'=>'7'
        ]);
        Parity::create([
            'parity_name'=>'8'
        ]);
        Parity::create([
            'parity_name'=>'9'
        ]);
        Parity::create([
            'parity_name'=>'10+'
        ]);
    }
}
