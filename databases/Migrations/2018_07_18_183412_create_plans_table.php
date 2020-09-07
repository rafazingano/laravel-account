<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_plans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('description');
            $table->decimal('price', 8, 2);
            $table->boolean('status')->default(1);
            $table->json('options')
                ->nullable()
                ->default(null);

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('option_plan', function (Blueprint $table) {
            $table->unsignedBigInteger('option_id');
            $table->unsignedBigInteger('plan_id');

            $table->foreign('option_id')
                ->references('id')
                ->on('options')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('plan_id')
                ->references('id')
                ->on('account_plans')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->primary(['option_id', 'plan_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('option_plan');
        Schema::dropIfExists('account_plans');
    }
}
