<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'can-send-message',
                'guard_name' => 'web',
                'created_at' => '2019-08-03 14:26:00',
                'updated_at' => '2019-08-03 14:26:00',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'can-reply-message',
                'guard_name' => 'web',
                'created_at' => '2019-08-03 14:26:00',
                'updated_at' => '2019-08-03 14:26:00',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'login',
                'guard_name' => 'web',
                'created_at' => '2019-08-03 14:26:00',
                'updated_at' => '2019-08-03 14:26:00',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'view-all-cards',
                'guard_name' => 'web',
                'created_at' => '2019-08-04 04:06:07',
                'updated_at' => '2019-08-04 04:06:07',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'add-card',
                'guard_name' => 'web',
                'created_at' => '2019-08-04 04:06:07',
                'updated_at' => '2019-08-04 04:06:07',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'edit-cards',
                'guard_name' => 'web',
                'created_at' => '2019-08-04 04:06:07',
                'updated_at' => '2019-08-04 04:06:07',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'view-all-accounts',
                'guard_name' => 'web',
                'created_at' => '2019-08-04 04:06:07',
                'updated_at' => '2019-08-04 04:06:07',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'add-account',
                'guard_name' => 'web',
                'created_at' => '2019-08-04 04:06:07',
                'updated_at' => '2019-08-04 04:06:07',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'edit-account',
                'guard_name' => 'web',
                'created_at' => '2019-08-04 04:06:07',
                'updated_at' => '2019-08-04 04:06:07',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'view-bank-transactions',
                'guard_name' => 'web',
                'created_at' => '2019-08-04 07:08:00',
                'updated_at' => '2019-08-04 07:08:00',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'add-bank-transactions',
                'guard_name' => 'web',
                'created_at' => '2019-08-04 07:08:00',
                'updated_at' => '2019-08-04 07:08:00',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'view-all-transactions',
                'guard_name' => 'web',
                'created_at' => '2019-08-04 04:18:00',
                'updated_at' => '2019-08-04 04:18:00',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'delete-account',
                'guard_name' => 'web',
                'created_at' => '2019-08-05 06:16:00',
                'updated_at' => '2019-08-05 06:16:00',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'restore-account',
                'guard_name' => 'web',
                'created_at' => '2019-08-05 03:22:00',
                'updated_at' => '2019-08-05 03:22:00',
            ),
        ));
        
        
    }
}