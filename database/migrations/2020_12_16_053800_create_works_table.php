<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('title');
            $table->text('description');
            $table->string('price');
            $table->string('address');
            $table->string('contacts')->nullable(true);
            $table->string('time_to_work');
            $table->foreignId('user_id');
            $table->date('exp_date');
            $table->timestamps();

                    //foreign keys
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('works');
    }
}
