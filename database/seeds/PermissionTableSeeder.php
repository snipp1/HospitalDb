<?php

use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $permissions=[
            [
                'name'=>'see_roles',
                'display_name'=>'View Roles',
                'description'=>'User can see Role List'
            ],
            [
                'name'=>'add_roles',
                'display_name'=>'Create Roles',
                'description'=>'User can create Roles'
            ],
            [
                'name'=>'edit_roles',
                'display_name'=>'Edit Roles',
                'description'=>'User can edit Roles'
            ],
            [
                'name'=>'delete_roles',
                'display_name'=>'Delete Roles',
                'description'=>'User can delete Roles'
            ],
            [
                'name'=>'see_permission',
                'display_name'=>'View permission',
                'description'=>'User can see permission List'
            ],
            [
                'name'=>'add_permission',
                'display_name'=>'Create Roles',
                'description'=>'User can create Roles'
            ],
            [
                'name'=>'edit_permission',
                'display_name'=>'Edit permission',
                'description'=>'User can edit permission'
            ],
            [
                'name'=>'delete_permission',
                'display_name'=>'Delete permission',
                'description'=>'User can delete permission'
            ],
            [
                'name'=>'see_patient',
                'display_name'=>'View patient',
                'description'=>'User can see patient List'
            ],
            [
                'name'=>'add_patient',
                'display_name'=>'Create patient',
                'description'=>'User can create patient'
            ],
            [
                'name'=>'edit_patient',
                'display_name'=>'Edit patient',
                'description'=>'User can edit patient'
            ],
            [
                'name'=>'delete_patient',
                'display_name'=>'Delete patient',
                'description'=>'User can delete patient'
            ],
            [
                'name'=>'see_item_bill',
                'display_name'=>'View item_bill',
                'description'=>'User can see item_bill List'
            ],
            [
                'name'=>'add_item_bill',
                'display_name'=>'Create item_bill',
                'description'=>'User can create item_bill'
            ],
            [
                'name'=>'edit_item_bill',
                'display_name'=>'Edit item_bill',
                'description'=>'User can edit item_bill'
            ],
            [
                'name'=>'delete_item_bill',
                'display_name'=>'Delete item_bill',
                'description'=>'User can delete item_bill'
            ],
            [
                'name'=>'bill_patient_item_bill',
                'display_name'=>'Delete item_bill',
                'description'=>'User can delete item_bill'
            ],
            [
                'name'=>'see_patient_item_bill',
                'display_name'=>' see_patient item_bill',
                'description'=>'User can see_patient item_bill'
            ],
            [
                'name'=>'collect_patient_item_bill',
                'display_name'=>'collect_patient item_bill',
                'description'=>'User can collect_patient item_bill'
            ],
            [
                'name'=>'see_user',
                'display_name'=>'see users ',
                'description'=>'User can collect_patient item_bill'
            ],
            [
                'name'=>'see_department',
                'display_name'=>'see departments ',
                'description'=>'User can collect_patient item_bill'
            ],
            [
                'name'=>'see_hospital',
                'display_name'=>'Hospitals ',
                'description'=>'User can collect_patient item_bill'
            ],
            [
                'name'=>'see_hospital_profile',
                'display_name'=>'Hospital Profile',
                'description'=>'User can collect_patient item_bill'
            ],
            [
                'name'=>'see_patient_billing',
                'display_name'=>'See Patient Bill Menu',
                'description'=>'User can collect_patient item_bill'
            ]
        ];
        foreach ($permissions as $key=>$value){
            \App\Permission::create($value);
        }
    }
}
