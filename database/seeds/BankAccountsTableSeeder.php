<?php

use Illuminate\Database\Seeder;

class BankAccountsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('bank_accounts')->delete();
        
        \DB::table('bank_accounts')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Ambrose Bako Temidayo',
                'number' => 'BBLND00394349',
                'available_balance' => 5.0,
                'ledger_balance' => 1000.0,
                'user_id' => 1,
                'bank_id' => 1,
                'bank_location_id' => 1,
                'created_at' => '2019-07-23 08:19:21',
                'updated_at' => '2019-07-23 08:19:21',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Ambrose Bako Temidayo',
                'number' => 'BBasND00394349',
                'available_balance' => 5.0,
                'ledger_balance' => 1240.0,
                'user_id' => 1,
                'bank_id' => 2,
                'bank_location_id' => 2,
                'created_at' => '2019-07-23 08:19:21',
                'updated_at' => '2019-07-23 08:19:21',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}