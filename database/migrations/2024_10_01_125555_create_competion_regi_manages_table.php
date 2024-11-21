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
        Schema::create('competion_regi_manages', function (Blueprint $table) {
            $table->id();
            $table->string('online_corporate');
            $table->string('student_fullName');
            $table->string('gender');
            $table->string('father_name');
            $table->string('father_occupation');
            $table->string('father_contactno');
            $table->string('mother_name');
            $table->string('mather_occupation');
            $table->string('mather_contactno');
            $table->string('school_enrolled');
            $table->string('present_address');
            $table->string('dateofbirth');
            $table->string('phone_number');
            $table->string('password');
            $table->string('text_password');
            $table->string('payment');
            $table->string('condition_name');
            $table->integer('level_name');
            $table->string('status')->nullable();
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
        Schema::dropIfExists('competion_regi_manages');
    }
};
