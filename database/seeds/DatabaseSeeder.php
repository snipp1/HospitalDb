<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);


         $this->call(PermissionTableSeeder::class);
         $this->call(ParityTableSeeder::class);
         $this->call(CountryTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(GenderTableSeeder::class);
         $this->call(MaritalStatusTableSeeder::class);
         $this->call(ReligionTableSeeder::class);
         $this->call(ClinicalVisitTableSeeder::class);
         $this->call(EducationTableSeeder::class);
         $this->call(EhnicityTableSeeder::class);
         $this->call(FacilityCategoryTableSeeder::class);
         $this->call(GestationalAgeTableSeeder::class);
         $this->call(NextOfKinRelationshipTableSeeder::class);
         $this->call(PatientGroupTableSeeder::class);
         $this->call(RaceTableSeeder::class);
         $this->call(ReasonForReferralTableSeeder::class);
         $this->call(TypeOfPatientTableSeeder::class);
         $this->call(TypeOfInsuranceTableSeeder::class);
        $this->call(UserTableSeeder::class);
    }
}
