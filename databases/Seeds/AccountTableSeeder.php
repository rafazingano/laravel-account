<?php

namespace ConfrariaWeb\Account\Databases\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('account_plans')->where('id', 1)->doesntExist()) {
            $plans = [
                [
                    'status' => 1,
                    'name' => 'Free',
                    'description' => 'Plano free',
                    'price' => 0,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'status' => 1,
                    'name' => 'Basico',
                    'description' => 'Plano basico',
                    'price' => 99.00,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]
            ];
            foreach ($plans as $plan) {
                DB::table('account_plans')->insert($plan);
            }
        }

        if (DB::table('accounts')->where('id', 1)->doesntExist()) {
            $accounts = [
                [
                    'status' => 1,
                    'plan_id' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]
            ];
            foreach ($accounts as $account) {
                DB::table('accounts')->insert($account);
            }
        }
    }

}
