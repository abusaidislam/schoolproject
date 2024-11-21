<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('special_exam_data', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('cat_id')->nullable();
            $table->string('game_time')->nullable();
            $table->string('right_ans')->nullable();
            $table->string('rong_ans')->nullable();
            $table->integer('status')->nullable();
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
        Schema::dropIfExists('special_exam_data');
    }
};
