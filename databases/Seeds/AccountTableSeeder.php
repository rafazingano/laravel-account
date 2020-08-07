<?php

namespace ConfrariaWeb\Account\Databases\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $plan = DB::table('plans')->find(1);
        if (empty($plan)) {
            DB::table('plans')->insert([
                'status' => 1,
                'name' => 'Free',
                'price' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }

        if (DB::table('accounts')->where('user_id', 1)->doesntExist()) {
            DB::table('accounts')->insert([
                'status' => 1,
                'plan_id' => 1,
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }

}
