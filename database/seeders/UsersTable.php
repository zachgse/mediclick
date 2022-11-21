<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class UsersTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $users = [
            //Clinic 101

            ['lastName' => 'Clinic Admin', 'firstName' => 'Juan', 'middleName' => 'San Jose', 'email' => 'clinicad.mediclick@gmail.com', 'password' => Hash::make('admin'), 
            'contactNo' => '09123456789', 'gender' => 'Male', 'branchAdd' => '107', 'City' => 'Taguig', 'barangay' => 'Palingon', 'Zip' =>'1204', 'conlastName' => 'Lontoc' , 
            'confirstName' => 'Juan' , 'conmiddleName' => 'San Jose' , 'conConNo' => '09123456789', "relationship" => 'Partners' , 'role' => 'Clinic Admin', 'status' => 0, 
             'email_verified_at' => now(),],
            
             ['lastName' => 'Clinic Physician', 'firstName' => 'Juanita', 'middleName' => 'San Jose', 'email' => 'physician.mediclick@gmail.com', 'password' => Hash::make('admin'), 
            'contactNo' => '09123456789', 'gender' => 'Female', 'branchAdd' => '107', 'City' => 'Makati', 'barangay' => 'Singkamas', 'Zip' =>'1204', 'conlastName' => 'Lontoc' , 
            'confirstName' => 'Juan' , 'conmiddleName' => 'San Jose' , 'conConNo' => '09123456789', "relationship" => 'Partners' ,'role' => 'Physician','status' => 0, 
             'email_verified_at' => now(), ],
             
             ['lastName' => 'Clinic Staff', 'firstName' => 'Juana', 'middleName' => 'San Jose', 'email' => 'nursestaff.mediclick@gmail.com', 'password' => Hash::make('admin'), 
             'contactNo' => '09123456789', 'gender' => 'Female', 'branchAdd' => '107', 'City' => 'Taguig', 'barangay' => 'La Paz', 'Zip' =>'1204', 'conlastName' => 'Lontoc' , 
             'confirstName' => 'Juan' , 'conmiddleName' => 'San Jose' , 'conConNo' => '09123456789', "relationship" => 'Partners' , 'role' => 'Staff', 'status' => 0, 
              'email_verified_at' => now(), ],

              ['lastName' => 'Clinic Patient', 'firstName' => 'Junior', 'middleName' => 'San Jose', 'email' => 'patient.mediclick@gmail.com', 'password' => Hash::make('admin'), 
              'contactNo' => '09123456789', 'gender' => 'Female', 'branchAdd' => '107', 'City' => 'Taguig', 'barangay' => 'Palingon', 'Zip' =>'1204', 'conlastName' => 'Lontoc' , 
              'confirstName' => 'Juan' , 'conmiddleName' => 'San Jose' , 'conConNo' => '09123456789', "relationship" => 'Partners' , 'role' => 'Patient', 'status' => 1, 
               'email_verified_at' => now(), ],

               ['lastName' => 'System Admin', 'firstName' => 'Jan', 'middleName' => 'San Jose', 'email' => 'mediclick.philippines@gmail.com', 'password' => Hash::make('admin'), 
              'contactNo' => '09123456789', 'gender' => 'Female', 'branchAdd' => '107', 'City' => 'Taguig', 'barangay' => 'Palingon', 'Zip' =>'1204', 'conlastName' => 'Lontoc' , 
              'confirstName' => 'Juan' , 'conmiddleName' => 'San Jose' , 'conConNo' => '09123456789', "relationship" => 'Partners' , 'role' => 'System Admin', 'status' => 1, 
               'email_verified_at' => now(), ],

            //Clinic 102
            
            ['lastName' => 'Administrator', 'firstName' => 'Jk', 'middleName' => 'Dela Cruz', 'email' => 'adclinic.mediclick@gmail.com', 'password' => Hash::make('admin'), 
            'contactNo' => '09123456789', 'gender' => 'Male', 'branchAdd' => '107', 'City' => 'Taguig', 'barangay' => 'Palingon', 'Zip' =>'1204', 'conlastName' => 'Lontoc' , 
            'confirstName' => 'Juan' , 'conmiddleName' => 'Dela Cruz' , 'conConNo' => '09123456789', "relationship" => 'Partners' , 'role' => 'Clinic Admin', 'status' => 0, 
             'email_verified_at' => now(),],
            
             ['lastName' => 'Physician', 'firstName' => 'Joon', 'middleName' => 'Dela Cruz', 'email' => 'clinicphysician.mediclick@gmail.com', 'password' => Hash::make('admin'), 
            'contactNo' => '09123456789', 'gender' => 'Male', 'branchAdd' => '107', 'City' => 'Makati', 'barangay' => 'Singkamas', 'Zip' =>'1204', 'conlastName' => 'Lontoc' , 
            'confirstName' => 'Juan' , 'conmiddleName' => 'Dela Cruz' , 'conConNo' => '09123456789', "relationship" => 'Partners' ,'role' => 'Physician', 'status' => 0, 
             'email_verified_at' => now(), ],
             
             ['lastName' => 'Staff', 'firstName' => 'Jin', 'middleName' => 'Dela Cruz', 'email' => 'clinicnursestaff.mediclick@gmail.com', 'password' => Hash::make('admin'), 
             'contactNo' => '09123456789', 'gender' => 'Female', 'branchAdd' => '107', 'City' => 'Taguig', 'barangay' => 'La Paz', 'Zip' =>'1204', 'conlastName' => 'Lontoc' , 
             'confirstName' => 'Juan' , 'conmiddleName' => 'Dela Cruz' , 'conConNo' => '09123456789', "relationship" => 'Partners' , 'role' => 'Staff', 'status' => 0, 
              'email_verified_at' => now(), ],

              ['lastName' => 'Patient', 'firstName' => 'Jim', 'middleName' => 'Dela Cruz', 'email' => 'clinicpatient.mediclick@gmail.com', 'password' => Hash::make('admin'), 
              'contactNo' => '09123456789', 'gender' => 'Male', 'branchAdd' => '107', 'City' => 'Taguig', 'barangay' => 'Palingon', 'Zip' =>'1204', 'conlastName' => 'Lontoc' , 
              'confirstName' => 'Juan' , 'conmiddleName' => 'Dela Cruz' , 'conConNo' => '09123456789', "relationship" => 'Partners' , 'role' => 'Patient', 'status' => 1, 
               'email_verified_at' => now(), ],


        ];
        DB::table('users')->insert($users);

        $subscriptions = [['name' => 'Basic', 'Amount' => '7000'], ['name' => 'Premium', 'Amount' => '12500'] ];
        DB::table('subscriptions')->insert($subscriptions);

      
    }
}
