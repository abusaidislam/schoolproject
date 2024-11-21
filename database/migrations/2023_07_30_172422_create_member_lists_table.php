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
        Schema::create('member_lists', function (Blueprint $table) {
            $table->id();
            $table->integer('teachername');
            $table->integer('designation');
            $table->longtext('eduqualification');
            $table->string('fathername');
            $table->integer('mothername');
            $table->longtext('presentaddress');
            $table->string('joiningdate');
            $table->string('gender');
            $table->string('relegion')->nullable();
            $table->string('contactno')->nullable();
            $table->string('dateofbirth')->nullable();
            $table->string('status')->nullable();
            $table->string('image');
            $table->string('subject')->nullable();
            $table->longtext('permanentaddress')->nullable();
            $table->string('promotiondate')->nullable();
            $table->string('bloodgroup')->nullable();
            $table->string('nationalid')->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->string('cv_upload')->nullable();
            $table->string('fb_link')->nullable();
            $table->string('tw_link')->nullable();
            $table->string('lin_link')->nullable();
            $table->string('ins_link')->nullable();
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
        Schema::dropIfExists('member_lists');
    }
};
