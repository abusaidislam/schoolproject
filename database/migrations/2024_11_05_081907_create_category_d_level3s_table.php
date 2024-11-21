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
        Schema::create('category_d_level3s', function (Blueprint $table) {
            $table->id();
            $table->integer('num_length');
            $table->integer('num_display');
            $table->integer('num_row');
            $table->integer('num_condition');
            $table->integer('game_time');
            $table->integer('status');
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
        Schema::dropIfExists('category_d_level3s');
    }
};
