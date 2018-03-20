<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $roles=[
            [
                'name'=>'developer',
                'display_name'=>'Supper developer',
                'description'=>'developer for the system'
            ],
            [
                'name'=>'ICT_MANAGER',
                'display_name'=>'ICT MANAGER',
                'description'=>'Supper Admin or ICT MANAGER for the system'
            ],
            [
                'name'=>'CEO',
                'display_name'=>'CEO',
                'description'=>'CEO for a Hospital'
            ],
            [
                'name'=>'DIRCTOR',
                'display_name'=>'DIRCTOR',
                'description'=>'DIRCTOR for a Hospital'
            ],
            [
                'name'=>'ACCOUNTANT',
                'display_name'=>'ACCOUNTANT',
                'description'=>'ACCOUNTANT for a Hospital'
            ],
            [
                'name'=>'ACCOUNTS_OFFICER',
                'display_name'=>'ACCOUNTS OFFICER',
                'description'=>'ACCOUNTS OFFICER for a Hospital'
            ],
            [
                'name'=>'STORES_MANAGER',
                'display_name'=>'STORES MANAGER',
                'description'=>'STORES MANAGER for a Hospital'
            ],
            [
                'name'=>'PHARMACIST',
                'display_name'=>'PHARMACIST',
                'description'=>'PHARMACIST for a Hospital'
            ],
            [
                'name'=>'BILLER',
                'display_name'=>'BILLER',
                'description'=>'BILLER for a Hospital'
            ],
            [
                'name'=>'CASHIER',
                'display_name'=>'CASHIER',
                'description'=>'CASHIER for a Hospital'
            ],
            [
                'name'=>'RECORDS',
                'display_name'=>'RECORDS',
                'description'=>'RECORDS for a Hospital'
            ],
            [
                'name'=>'BIOSTATISTICS',
                'display_name'=>'BIOSTATISTICS',
                'description'=>'BIOSTATISTICS for a Hospital'
            ],
            [
                'name'=>'HOD',
                'display_name'=>'HOD',
                'description'=>'HOD for a Hospital'
            ],
            [
                'name'=>'ADMINISTRATOR',
                'display_name'=>'ADMINISTRATOR',
                'description'=>'ADMINISTRATOR for a Hospital'
            ],
            [
                'name'=>'ICT_HEAD',
                'display_name'=>'ICT HEAD',
                'description'=>'ICT HEAD for a Hospital'
            ],
            [
                'name'=>'NURSE',
                'display_name'=>'NURSE',
                'description'=>'NURSE for a Hospital'
            ],
            [
                'name'=>'BLOOD_BANK',
                'display_name'=>'BLOOD BANK',
                'description'=>'BLOOD BANK for a Hospital'
            ],
            [
                'name'=>'LAB_TECHNICIAN',
                'display_name'=>'LAB TECHNICIAN',
                'description'=>'LAB TECHNICIAN for a Hospital'
            ],
            [
                'name'=>'MORGUE_ATTENDANT',
                'display_name'=>'MORGUE ATTENDANT',
                'description'=>'MORGUE ATTENDANT for a Hospital'
            ],
            [
                'name'=>'RADIOLOGIST',
                'display_name'=>'RADIOLOGIST',
                'description'=>'RADIOLOGIST for a Hospital'
            ],
            [
                'name'=>'DIETHERAPIST',
                'display_name'=>'DIETHERAPIST',
                'description'=>'DIETHERAPIST for a Hospital'
            ]
        ];

        foreach ($roles as $key=>$value){
            $role= \App\Role::create($value);
            if ($role->name=='developer'){
                $permissions=\App\Permission::all();
                foreach ($permissions as $value) {
                    $role->attachPermission($value->id);

                }
            }
        }
    }
}
