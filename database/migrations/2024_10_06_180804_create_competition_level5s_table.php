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
        Schema::create('competition_level5s', function (Blueprint $table) {
            $table->id();
            $table->integer('num_length1');
            $table->integer('num_length2');
            $table->integer('num_display');
            $table->integer('num_row');
            $table->integer('num_condition');
            $table->string('type');
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
        Schema::dropIfExists('competition_level5s');
    }
};