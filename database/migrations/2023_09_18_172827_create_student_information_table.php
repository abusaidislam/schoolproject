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
        Schema::create('student_information', function (Blueprint $table) {
            $table->id();
            $table->string('classname');
            $table->string('rollno')->nullable();
            $table->string('regno')->nullable();
            $table->string('studentname');
            $table->string('studentimage')->nullable();
            $table->string('fathername');
            $table->string('mothername');
            $table->string('gender');
            $table->string('dateofbirth')->nullable();
            $table->string('bloodgroup')->nullable();
            $table->string('contactno');
            $table->string('nationality')->nullable();
            $table->string('admissiondate');
            $table->string('presentaddress')->nullable();
            $table->string('permanentaddress')->nullable();
            $table->string('relegion')->nullable();
            $table->string('session')->nullable();
            $table->string('nationalid')->nullable();
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
        Schema::dropIfExists('student_information');
    }
};
