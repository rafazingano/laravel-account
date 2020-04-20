<?php

namespace ConfrariaWeb\Account\Databases\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Accounts')->insert([
            'status' => 1,
            'user_id' => 1
        ]);
    }
}
