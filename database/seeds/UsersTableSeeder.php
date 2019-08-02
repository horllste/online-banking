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
                'is_active' => '1',
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => '2019-07-22 19:43:36',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}