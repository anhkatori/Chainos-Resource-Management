<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOTCostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ot_cost', function (Blueprint $table) {
            $table->increments('id');
            $table->date('time')->nullable();
            $table->integer('staff_id')->nullable();
            $table->integer('time_OT')->nullable();
            $table->integer('OT_cost')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ot_cost');
    }
}
