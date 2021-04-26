<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCategoryMaster extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_master', function (Blueprint $table) {
            $table->foreignId('master_id')->references('id')->on('masters')->onDelete('cascade');
            $table->foreignId('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->primary(array('master_id','category_id'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_master');
    }
}
