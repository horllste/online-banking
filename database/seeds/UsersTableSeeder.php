<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'picture' => '',
                'first_name' => 'Ambrose',
                'middle_name' => 'Temidayo',
                'last_name' => 'Bako',
                'email' => 'bakoambrose@gmail.com',
                'alt_email' => 'bakoambrose@gmail.com',
                'username' => 'gh0012001',
                'phone_number' => '0557484181',
                'email_verified_at' => NULL,
                'password' => '$2y$10$OvubWPB1L7wqfWHLL0P85OoCr51HNFLYZcKeRft/fIpXq6k3SmnOW',
                'country_id' => 231,
                'description' => NULL,
                'address' => '103 Ramblewood Ave. 
San Diego, CA 92117',
                'remember_token' => NULL,
                'created_at' => '2019-08-03 19:43:36',
                'updated_at' => '2019-07-22 19:43:36',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'picture' => '',
                'first_name' => 'System',
                'middle_name' => NULL,
                'last_name' => 'Administrator',
                'email' => 'system_admin@gmail.com',
                'alt_email' => 'alt_system_admin@gmail.com',
                'username' => 'SYSADMIN',
                'phone_number' => '16096430866',
                'email_verified_at' => NULL,
                'password' => '$2y$10$OvubWPB1L7wqfWHLL0P85OoCr51HNFLYZcKeRft/fIpXq6k3SmnOW',
                'country_id' => 231,
                'description' => 'System Admin Account',
                'address' => '103 Ramblewood Ave. 
San Diego, CA 92117',
                'remember_token' => NULL,
                'created_at' => '2019-08-03 19:43:36',
                'updated_at' => '2019-08-03 19:43:36',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'picture' => '',
                'first_name' => 'Customer',
                'middle_name' => NULL,
                'last_name' => 'Care',
                'email' => 'cc@gmail.com',
                'alt_email' => 'alt_cc@gmail.com',
                'username' => 'CUSTOMERCARE',
                'phone_number' => '14096430866',
                'email_verified_at' => NULL,
                'password' => '$2y$10$OvubWPB1L7wqfWHLL0P85OoCr51HNFLYZcKeRft/fIpXq6k3SmnOW',
                'country_id' => 231,
                'description' => 'Customer Care Account',
                'address' => '103 Ramblewood Ave. 
San Diego, CA 92117',
                'remember_token' => NULL,
                'created_at' => '2019-08-03 19:43:36',
                'updated_at' => '2019-08-03 19:43:36',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}