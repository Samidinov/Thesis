<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ServiceWork extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_work', function (Blueprint $table) {
            $table->id('work_id')->autoIncrement(false);
            $table->id('service_id')->autoIncrement(false);
            $table->foreign('work_id')->references('id')->on('works')->onDelete('cascade');
            $table->foreign('service_id')->references('id')->on('categories')->onDelete('cascade');
            $table->primary(array('work_id','service_id'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_work');
    }
}
