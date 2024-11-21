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
        Schema::create('basic_infos', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('address');
            $table->string('email');
            $table->string('mobile');
            $table->string('favIcon',100);
            $table->string('fbLink')->nullable();
            $table->string('instraLink')->nullable();
            $table->string('youTubeLink')->nullable();
            $table->text('google')->nullable();
            $table->string('whatsapp')->nullable();
            $table->text('message')->nullable();
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
        Schema::dropIfExists('basic_infos');
    }
};
