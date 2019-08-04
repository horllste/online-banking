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
        ));
        
        
    }
}