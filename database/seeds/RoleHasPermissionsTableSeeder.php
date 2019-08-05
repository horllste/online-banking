<?php

use Illuminate\Database\Seeder;

class RoleHasPermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('role_has_permissions')->delete();
        
        \DB::table('role_has_permissions')->insert(array (
            0 => 
            array (
                'permission_id' => 1,
                'role_id' => 2,
            ),
            1 => 
            array (
                'permission_id' => 2,
                'role_id' => 2,
            ),
            2 => 
            array (
                'permission_id' => 4,
                'role_id' => 2,
            ),
            3 => 
            array (
                'permission_id' => 5,
                'role_id' => 2,
            ),
            4 => 
            array (
                'permission_id' => 6,
                'role_id' => 2,
            ),
            5 => 
            array (
                'permission_id' => 7,
                'role_id' => 2,
            ),
            6 => 
            array (
                'permission_id' => 8,
                'role_id' => 2,
            ),
            7 => 
            array (
                'permission_id' => 9,
                'role_id' => 2,
            ),
            8 => 
            array (
                'permission_id' => 10,
                'role_id' => 2,
            ),
            9 => 
            array (
                'permission_id' => 11,
                'role_id' => 2,
            ),
            10 => 
            array (
                'permission_id' => 13,
                'role_id' => 2,
            ),
            11 => 
            array (
                'permission_id' => 14,
                'role_id' => 2,
            ),
        ));
        
        
    }
}