<?php

use Illuminate\Database\Seeder;

class AccountTypesTableSeeder extends Seeder
{
    private $accountTypes = [
        [
            'id' => 0,
            'account_type' => 'Standard',
            'description' => 'Account for your average user',
            'cost' => 2000
        ],
        [
            'id' => 1,
            'account_type' => 'Admin',
            'description' => 'For those who need a little more control',
            'cost' => 4000
        ]
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->accountTypes as $account) {
            DB::table('account_types')->insert($account);
        }
    }
}
