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
            $table->id();
            $table->foreignId('parent_id')->nullable()->constrained('accounts');
            $table->foreignId('plan_id')->constrained();
            $table->string('name');
            $table->boolean('status')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });

        /*Schema::create('account_parent', function (Blueprint $table) {
            $table->foreignId('account_id')->constrained('accounts')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('parent_id')->constrained('accounts')->onUpdate('cascade')->onDelete('cascade');
            $table->unique(['account_id', 'parent_id']);
        });*/

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {     
        //Schema::dropIfExists('account_parent');
        Schema::dropIfExists('accounts');
    }
}
