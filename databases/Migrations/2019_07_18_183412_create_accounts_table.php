<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('plan_id');
            //$table->unsignedBigInteger('user_id');
            $table->boolean('status')->default(1);
            $table->timestamps();
            
            $table->foreign('plan_id')
                ->references('id')
                ->on('account_plans')
                ->onDelete('cascade');
            
            /*$table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}
