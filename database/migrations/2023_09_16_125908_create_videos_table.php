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
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->integer('albume_type');
            $table->string('albume_slug');
            $table->string('title');
            $table->longtext('vcode');
            $table->string('vStatus')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('videos');
    }
};
