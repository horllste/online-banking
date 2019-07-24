<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Customer',
                'guard_name' => 'web',
                'created_at' => '2019-07-22 06:23:00',
                'updated_at' => '2019-07-22 06:23:00',
            ),
        ));
        
        
    }
}