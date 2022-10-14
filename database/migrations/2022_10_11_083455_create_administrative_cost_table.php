<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdministrativeCostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administrative_cost', function (Blueprint $table) {
            $table->increments('id');
            $table->date('time')->nullable();
            $table->biginteger('office_cost')->nullable();
            $table->biginteger('other_cost')->nullable();
            $table->biginteger('staff_cost')->nullable();
            $table->integer('staffs')->nullable();
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
        Schema::dropIfExists('administrative_cost');
    }
}
