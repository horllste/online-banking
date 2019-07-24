<?php

use Illuminate\Database\Seeder;

class BanksTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('banks')->delete();
        
        \DB::table('banks')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Barclay\'s Bank',
                'picture' => 'https://eadb.org/wp-content/uploads/2015/08/Barclays-Logo.png',
                'code' => 'BBLND',
                'created_at' => '2019-07-23 08:19:21',
                'updated_at' => '2019-07-23 08:19:21',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Bank Of America',
                'picture' => 'https://thumbor.forbes.com/thumbor/416x416/filters%3Aformat%28jpg%29/https%3A%2F%2Fspecials-images.forbesimg.com%2Fimageserve%2F5cca0b264bbe6f7e6e22b5f8%2F0x0.jpg%3Fbackground%3D000000%26cropX1%3D0%26cropX2%3D416%26cropY1%3D0%26cropY2%3D416',
                'code' => 'BBALND',
                'created_at' => '2019-07-23 08:19:21',
                'updated_at' => '2019-07-23 08:19:21',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}