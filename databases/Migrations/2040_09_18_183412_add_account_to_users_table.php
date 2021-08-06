<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAccountToUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        /*if (!Schema::hasColumn('users', 'account_id')) {
            Schema::table('users', function (Blueprint $table) {
                $table->unsignedBigInteger('account_id')
                        ->nullable()
                        ->after('id');

                $table->foreign('account_id')
                        ->references('id')
                        ->on('accounts')
                        ->onUpdate('cascade')
                        ->onDelete('cascade');
            });
        }*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        /*if (Schema::hasColumn('users', 'account_id')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropForeign(['account_id']);
                $table->dropColumn('account_id');
            });
        }*/
    }

}
