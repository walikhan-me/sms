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
        Schema::create('inactivestudents', function (Blueprint $table) {
            $table->id();
            $table->string('student_name');
            $table->string('class');
            $table->string('section');
            $table->string('sid')->unique(); // Unique for the entire school
            $table->string('father_name');
            
            $table->string('mobile_number');
            $table->string('status');
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
        Schema::dropIfExists('inactivestudents');
    }
};
