<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project', function (Blueprint $table) {
            $table->increments('id');
            $table->string('project_name')->nullable();
            $table->string('Sale_PIC')->nullable();
            $table->string('Market')->nullable();
            $table->date('Time_deployment_start')->nullable();
            $table->date('Time_deployment_end')->nullable();
            // $table->string('monthly_cost')->nullable();
            // $table->string('monthly_revenue')->nullable();
            // $table->string('deploy_accumulated')->nullable();
            // $table->string('revenue_accumulated')->nullable();
            // $table->string('profit_loss')->nullable();
            // $table->string('rofit_loss_accumulated')->nullable();
            $table->boolean('status')->nullable();
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
        Schema::dropIfExists('project');
    }
}
