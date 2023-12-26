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
        Schema::create('schoolmodels', function (Blueprint $table) {
            $table->id();
            $table->string('schoolname');
            $table->text('address');
            $table->string('contactnumber');
            $table->string('city');
            $table->string('province');
            $table->string('block');
            $table->string('ownername');
            $table->string('schoollogo');
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
        Schema::dropIfExists('schoolmodels');
    }
};
