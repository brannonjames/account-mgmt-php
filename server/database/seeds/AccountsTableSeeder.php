<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class AccountsTableSeeder extends Seeder
{
    private $accounts = [
        [
          'first_name' => 'Jimmy',
          'last_name' => 'Brannon',
          'email' => 'james.brannon12@gmail.com',
          'account_type_id' => 0,
          'place' => 'Confirmation'
        ],
        [
          'first_name' => 'Steven',
          'last_name' => 'Feemster',
          'email' => 'StevenIFeemster@dayrep.com',
          'account_type_id' => 0,
          'place' => 'Confirmation'
        ],
        [
          'first_name' => 'Daniel',
          'last_name' => 'Bessette',
          'email' => 'DanielABessette@armyspy.com',
          'account_type_id' => 0,
          'place' => 'Confirmation'
        ],
        [
          'first_name' => 'Evelyn',
          'last_name' => 'Riley',
          'email' => 'EvelynTRiley@rhyta.com',
          'account_type_id' => 1,
          'place' => 'Confirmation'
        ],
      ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->accounts as $account) {
            DB::table('accounts')->insert($account);
        }
    }
}
