<?php

use Illuminate\Database\Seeder;

class CardTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('card_types')->delete();
        
        \DB::table('card_types')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Mastercard',
                'picture' => 'https://www.mastercard.us/content/dam/mccom/global/logos/logo-mastercard-mobile.svg',
                'created_at' => '2019-07-23 13:16:19',
                'updated_at' => '2019-07-23 13:16:19',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'VISA',
                'picture' => 'https://i.pinimg.com/originals/55/a3/c2/55a3c2e6e01843e209cf2c2b279363b9.png',
                'created_at' => '2019-07-23 13:16:19',
                'updated_at' => '2019-07-23 13:16:19',
            ),
        ));
        
        
    }
}