<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAccountToEntrustTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        if (!Schema::hasColumn(config('cw_entrust.roles_table'), 'account_id')) {
            Schema::table(config('cw_entrust.roles_table'), function (Blueprint $table) {
                $table->unsignedBigInteger('account_id')
                        ->nullable()
                        ->after('id');

                $table->foreign('account_id')
                        ->references('id')
                        ->on('accounts')
                        ->onUpdate('cascade')
                        ->onDelete('cascade');
            });
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {

        if (Schema::hasColumn(config('cw_entrust.roles_table'), 'account_id')) {
            Schema::table(config('cw_entrust.roles_table'), function (Blueprint $table) {
                $table->dropForeign(['account_id']);
                $table->dropColumn('account_id');
            });
        }

    }

}
